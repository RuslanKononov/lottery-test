<?php

namespace App\Command;

use App\Model\UserInvoiceDTO;
use App\Model\UserDTO;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class UserCreateCommand extends Command
{
    protected static $defaultName = 'app:user-create';

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @param UserService            $userService
     * @param EntityManagerInterface $em
     */
    public function __construct(UserService $userService, EntityManagerInterface $em)
    {
        $this->userService = $userService;
        $this->em = $em;

        parent::__construct();
    }

    /**
     * Configure command
     */
    protected function configure()
    {
        $this
            ->setDescription('Create user of lottery')
            ->addOption('username', 'u', InputOption::VALUE_REQUIRED, 'Username for login')
            ->addOption('password', 'p', InputOption::VALUE_REQUIRED, 'Password')
            ->addOption(
                'roles',
                'r',
                InputOption::VALUE_IS_ARRAY|InputOption::VALUE_OPTIONAL,
                'Roles. For example: [ROLE_ADMIN] or [ROLE_ADMIN, ROLE_MANAGER]',
                []
            )
            ->addOption('account', 'a', InputOption::VALUE_OPTIONAL, 'Account of invoice', '')
            ->addOption('owner', 'o', InputOption::VALUE_OPTIONAL, 'Owner of invoice', '')
        ;
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $userDTO = new UserDTO(
            $input->getOption('username'),
            $input->getOption('password'),
            $input->getOption('roles')
        );
        $userInvoiceDTO = new UserInvoiceDTO(
            $input->getOption('account'),
            $input->getOption('owner')
        );
        try {
            $user = $this->userService->createUser($userDTO);
            $this->userService->setUserInvoice($user, $userInvoiceDTO);

            $this->em->persist($user);
            $this->em->flush();
        } catch (\Exception $e) {
            $io->error(sprintf( 'User creation was failed with Exception: %s', $e->getMessage()));
            echo $e->getMessage();
            return $e->getCode();
        }


        $io->success('User was created.');

        return 0;
    }
}
