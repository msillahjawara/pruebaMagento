<?php

namespace Hiberus\Sillah\Console;

use Hiberus\Sillah\Block\Index;
use Hiberus\Sillah\Model\Exam;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;


class MarksCommand extends Command
{

    //const NAME = 'name';
    /**
     * @var Exam
     */
    protected Exam $exam;

    /**
     * @var Index
     */
    protected Index $block;

    /**
     * @param Index $block
     * @param string|null $name
     */
    public function __construct(Index $block,Exam $exam, string $name = null)
    {
        $this->block = $block;
        $this->exam=$exam;
        parent::__construct($name);
    }


    protected function configure()
    {
        $this->setName('hiberus:exams:show')
            ->setDescription('Mostrar examenes')
            /*->addOption(
                self::NAME,
                null,
                InputOption::VALUE_OPTIONAL,
                'Name'
            )*/;

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /*if ($input->getOption(self::NAME)) {
            $name = $input->getOption(self::NAME);
        } else {
            $name = $this->exam->getMark();
        }*/
        $exams = $this->block->getExams();
        foreach ($exams as $item){
            $this->exam->setIdExam($item->getIdExam());
            $this->exam->setFirstname($item->getFirstname());
            $this->exam->setLastname($item->getLastname());
            $this->exam->setMark($item->getMark());
            $output->writeln('<info> ID: ' . $this->exam->getIdExam() . ' | Nombre: ' . $this->exam->getFirstname() . ' | Apellidos: ' . $this->exam->getLastname() .
                ' | Nota: ' . $this->exam->getMark() . '</info>');
        }
    }
}
