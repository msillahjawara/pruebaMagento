<?php

namespace Hiberus\Curso\console;

use Hiberus\Curso\model\Author;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;


class AuthorsCommand extends Command
{

    const NAME = 'name';
    /**
     * @var Author
     */
    protected \Hiberus\Curso\model\Author $author;

    /**
     * @param Author $author
     * @param string|null $name
     */
    public function __construct(Author $author, string $name = null)
    {
        $this->author = $author;
        parent::__construct($name);
    }


    protected function configure()
    {
        $this->setName('hiberus:authors:show')
            ->setDescription('Mostrar autores')
            ->addOption(
                self::NAME,
                null,
                InputOption::VALUE_OPTIONAL,
                'Name'
            );

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getOption(self::NAME)) {
            $name = $input->getOption(self::NAME);
        } else {
            $name = $this->author->getAuthorName();
        }
        $output->writeln('<info>Mi autor favorito es ' . $name . '</info>');
    }

}
