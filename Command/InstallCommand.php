<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mkurzeja
 * Date: 03.10.13
 * Time: 14:23
 * To change this template use File | Settings | File Templates.
 */

namespace Accesto\InstallerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use RuntimeException;

class InstallCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('accesto::install')
            ->setDescription('Accesto installer.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Installing AccestoCMS.</info>');
        $output->writeln('');

        $this
            ->checkStep($input, $output)
            ->setupStep($input, $output)
        ;

        $output->writeln('<info>Sylius has been successfully installed.</info>');
    }

    protected function checkStep(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Checking system requirements.</info>');

        $fulfilled = true;

        foreach ($this->getContainer()->get('accesto.installer.requirements') as $collection) {
            $output->writeln(sprintf('<comment>%s</comment>', $collection->getLabel()));
            foreach ($collection as $requirement) {
                $output->write($requirement->getLabel());
                if ($requirement->isFulfilled()) {
                    $output->writeln(' <info>OK</info>');
                } else {
                    if ($requirement->isRequired()) {
                        $fulfilled = false;
                        $output->writeln(' <error>ERROR</error>');
                        $output->writeln(sprintf('<comment>%s</comment>', $requirement->getHelp()));
                    } else {
                        $output->writeln(' <comment>WARNING</comment>');
                    }
                }
            }
        }

        if (!$fulfilled) {
            throw new RuntimeException('Some system requirements are not fulfilled. Please check output messages and fix them.');
        }

        $output->writeln('');

        return $this;
    }

    protected function setupStep(InputInterface $input, OutputInterface $output)
    {

        $output->writeln('<info>Running installer actions</info>');

        foreach ($this->getContainer()->get('accesto.installer.actions') as $collection) {
            $output->writeln(sprintf('<comment>%s</comment>', $collection->getLabel()));
            foreach ($collection as $action) {
                $output->write($action->getLabel());
                $output->write($action->getDescription());
                if ($action->run($this, $input, $output)) {
                    $output->writeln(' <info>OK</info>');
                } else {
                    $output->writeln(' <error>ERROR</error>');
                    $output->writeln(sprintf('<comment>%s</comment>', $action->getError()));
                }
            }
        }

        $output->writeln('');

        return $this;
    }

    public function runCommand($command, InputInterface $input, OutputInterface $output)
    {
        $this
            ->getApplication()
            ->find($command)
            ->run($input, $output)
        ;

        return $this;
    }
}