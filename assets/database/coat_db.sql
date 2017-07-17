-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 17, 2017 at 04:00 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`) VALUES
(1, 'admin', '0cc175b9c0f1b6a831c399e269772661');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` int(5) NOT NULL,
  `collegeName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `collegeName`) VALUES
(1, 'JSS Academy of Technical Education, Noida');

-- --------------------------------------------------------

--
-- Table structure for table `compulsorySkills`
--

CREATE TABLE `compulsorySkills` (
  `id` int(5) NOT NULL,
  `skill_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(5) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`) VALUES
(1, 'B.Tech-CSE'),
(2, 'B.Tech-IT');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(5) NOT NULL,
  `question` longtext NOT NULL,
  `option1` longtext NOT NULL,
  `option2` longtext NOT NULL,
  `option3` longtext NOT NULL,
  `option4` longtext NOT NULL,
  `difficulty_level` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `expert_time` int(5) NOT NULL,
  `skill_id` int(5) NOT NULL,
  `answer` enum('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `option1`, `option2`, `option3`, `option4`, `difficulty_level`, `expert_time`, `skill_id`, `answer`) VALUES
(1, '<p>What is operating system?</p>\r\n', '<p>collection of programs that manages hardware resources</p>\r\n', '<p>system service provider to the application programs</p>\r\n', '<p>link to interface the hardware and application programs</p>\r\n', '<p>All the above</p>\r\n', '1', 10, 19, '4'),
(2, '<p>By operating system, the resource management can be done via:</p>\r\n\r\n<p style="margin-left:36.0pt">&nbsp;</p>\r\n', '<p>time division multiplexing</p>\r\n', '<p>space division multiplexing</p>\r\n', '<p>both (a) and (b)</p>\r\n', '<p>none of the above</p>\r\n', '1', 10, 19, '3'),
(3, '<p>Process is</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>program in High level language kept on disk</p>\r\n', '<p>contents of main memory</p>\r\n', '<p>a program in execution</p>\r\n', '<p>a job in secondary memory</p>\r\n', '1', 10, 19, '3'),
(4, '<p>A critical region is</p>\r\n', '<p>a program segment that often causes unexpected system crashes</p>\r\n', '<p>a program segment where shared resources are accessed</p>\r\n', '<p>one which is enclosed by a pair of P and V operations on semaphores</p>\r\n', '<p>none of the above</p>\r\n', '1', 10, 19, '4'),
(5, '<p>Assembler language<br />\r\n&nbsp;</p>\r\n', '<p>is usually the primary user interface</p>\r\n', '<p>requires fixed-format commands</p>\r\n', '<p>is a mnemonic form of machine language</p>\r\n', '<p>is quite different from the SCL interpreter</p>\r\n', '1', 10, 19, '3'),
(6, '<p>The primary job of the operating system of a computer is to<br />\r\n&nbsp;</p>\r\n', '<p>command resources</p>\r\n', '<p>manage resources</p>\r\n', '<p>provide utilities</p>\r\n', '<p>be user friendly</p>\r\n', '1', 10, 19, '2'),
(7, '<p>Which module gives control of the CPU to the process selected by the short-term scheduler?<br />\r\n&nbsp;</p>\r\n', '<p>dispatcher</p>\r\n', '<p>interrupt</p>\r\n', '<p>scheduler</p>\r\n', '<p>&nbsp;none of the above</p>\r\n', '1', 10, 19, '1'),
(8, '<p>Race around condition occurs when ?&nbsp;<br />\r\n&nbsp;</p>\r\n', '<p>Two processed unknowingly wait for resources that are help by each other<br />\r\n&nbsp;</p>\r\n', '<p>Two process wait for same resources</p>\r\n', '<p><br />\r\nAll resources are shared</p>\r\n', '<p>Two processes share the same shared resource</p>\r\n', '1', 10, 19, '2'),
(9, '<p>PCB =<br />\r\n&nbsp;</p>\r\n', '<p>Program Control Block</p>\r\n', '<p>Process Control Block</p>\r\n', '<p>Process Communication Block</p>\r\n', '<p>None of the above</p>\r\n', '1', 10, 19, '2'),
(10, '<p>FIFO scheduling is ________.<br />\r\n&nbsp;</p>\r\n', '<p>Non Preemptive Scheduling</p>\r\n', '<p>Deadline Scheduling</p>\r\n', '<p>Preemptive Scheduling</p>\r\n', '<p>Fair share scheduling</p>\r\n', '1', 10, 19, '1'),
(11, '<p>The Banker&#39;s algorithm is used<br />\r\n&nbsp;</p>\r\n', '<p>to prevent deadlock in operating systems</p>\r\n', '<p>to detect deadlock in operating systems</p>\r\n', '<p>to rectify a deadlocked state</p>\r\n', '<p>none of the above</p>\r\n', '1', 10, 19, '1'),
(12, '<p>An assembler is used to translate a program written in<br />\r\n&nbsp;</p>\r\n', '<p>A Low Language</p>\r\n', '<p>A high Language</p>\r\n', '<p>Middle Language</p>\r\n', '<p>Assembly Language</p>\r\n', '1', 10, 19, '4'),
(13, '<p>Memory management is:<br />\r\n&nbsp;</p>\r\n', '<p>replaced with virtual memory on current systems</p>\r\n', '<p>not used in modern operating system</p>\r\n', '<p>not used on multiprogramming systems</p>\r\n', '<p>critical for even the simplest operating systems</p>\r\n', '1', 10, 1, '1'),
(14, '<p>Dead-lock in an Operating System is<br />\r\n&nbsp;</p>\r\n', '<p>Definite waiting process</p>\r\n', '<p>Desirable process</p>\r\n', '<p>Undesirable process</p>\r\n', '<p>All the above</p>\r\n', '1', 10, 19, '1'),
(15, '<p>Which of the following approaches do not require knowledge of the system state?<br />\r\n&nbsp;</p>\r\n', '<p>Deadlock detection</p>\r\n', '<p>Deadlock dAvoidence</p>\r\n', '<p>Deadlock Prevention</p>\r\n', '<p>None of the above</p>\r\n', '1', 10, 19, '4'),
(16, '<p>Round robin scheduling is essentially the preemptive version of ________ ?<br />\r\n&nbsp;</p>\r\n', '<p>FIFO</p>\r\n', '<p>Shortest job first</p>\r\n', '<p>Shortest remaining</p>\r\n', '<p>Longest time first</p>\r\n', '1', 10, 19, '1'),
(17, '<p>&nbsp;A page fault occurs ?<br />\r\n&nbsp;</p>\r\n', '<p>when the page is not in the memory</p>\r\n', '<p>when the page is in the memory</p>\r\n', '<p>when the process enters the blocked state</p>\r\n', '<p>when the process is in the ready state</p>\r\n', '1', 10, 19, '1'),
(18, '<p>Which of the following will determine your choice of systems software for your computer?&nbsp;<br />\r\n&nbsp;</p>\r\n', '<p>Is the applications software you want to use compatible with it ?</p>\r\n', '<p>Is it expensive ?</p>\r\n', '<p>Is it compatible with your hardware ?</p>\r\n', '<p>Both 1 and 3</p>\r\n', '1', 10, 19, '4'),
(19, '<p>What is a shell ?&nbsp;<br />\r\n&nbsp;</p>\r\n', '<p>is a hardware component</p>\r\n', '<p>It is a command interpreter</p>\r\n', '<p>It is a part in compiler</p>\r\n', '<p>It is a tool in CPU scheduling</p>\r\n', '1', 10, 19, '2'),
(20, '<p>The processes that are residing in main memory and are ready and waiting to execute are kept on a list called<br />\r\n&nbsp;</p>\r\n', '<p>job queue</p>\r\n', '<p>ready queue</p>\r\n', '<p>execution queue</p>\r\n', '<p>process queue</p>\r\n', '2', 10, 19, '2'),
(21, '<p>The interval from the time of submission of a process to the time of completion is termed as<br />\r\n&nbsp;</p>\r\n', '<p>waiting time</p>\r\n', '<p>turnaround time</p>\r\n', '<p>response time</p>\r\n', '<p>throughput</p>\r\n', '2', 10, 19, '2'),
(22, '<p>Which scheduling algorithm allocates the CPU first to the process that requests the CPU first?<br />\r\n&nbsp;</p>\r\n', '<p>first-come, first-served scheduling</p>\r\n', '<p>shortest job scheduling</p>\r\n', '<p>priority scheduling</p>\r\n', '<p>none of the above</p>\r\n', '2', 10, 19, '1'),
(23, '<p>In priority scheduling algorithm<br />\r\n&nbsp;</p>\r\n', '<p>CPU is allocated to the process with highest priority</p>\r\n', '<p>CPU is allocated to the process with lowest priority</p>\r\n', '<p>equal priority processes can not be scheduled</p>\r\n', '<p>none of the above</p>\r\n', '2', 10, 19, '1'),
(24, '<p>Virtual memory is ..... ?<br />\r\n&nbsp;</p>\r\n', '<p>An extremely large main memory</p>\r\n', '<p>An extremely large secondary memory</p>\r\n', '<p>An illusion of extremely large main memory</p>\r\n', '<p>A type of memory used in super computers</p>\r\n', '2', 10, 19, '3'),
(25, '<p>Concurrent process are ?<br />\r\n&nbsp;</p>\r\n', '<p>Processes that do not overlap in time</p>\r\n', '<p>Process that overlap in time</p>\r\n', '<p>Processes that are executed by the processor at the same time</p>\r\n', '<p>None of the above</p>\r\n', '2', 10, 19, '2'),
(26, '<p>Which is not the state of the process ?<br />\r\n&nbsp;</p>\r\n', '<p>Blocked</p>\r\n', '<p>Running</p>\r\n', '<p>Ready&nbsp;</p>\r\n', '<p>Privileged</p>\r\n', '2', 10, 19, '4'),
(27, '<p>Which is not the state of the process ?<br />\r\n&nbsp;</p>\r\n', '<p>Blocked</p>\r\n', '<p>Running</p>\r\n', '<p>Ready&nbsp;</p>\r\n', '<p>Privileged</p>\r\n', '2', 10, 19, '4'),
(28, '<p>Size of the virtual memory depends upon ?<br />\r\n&nbsp;</p>\r\n', '<p>Data Bus</p>\r\n', '<p>Address Bus</p>\r\n', '<p>Size of main memory</p>\r\n', '<p>Memory buffer register</p>\r\n', '2', 10, 19, '2'),
(29, '<p>Which of the following approaches do not require knowledge of the system state?<br />\r\n&nbsp;</p>\r\n', '<p>Deadlock detection</p>\r\n', '<p>Deadlock Avoidence</p>\r\n', '<p>Deadlock Prevention</p>\r\n', '<p>None of the above</p>\r\n', '2', 10, 19, '4'),
(30, '<p>Which of the following scheduling policy is well suited for time shared operating system?<br />\r\n&nbsp;</p>\r\n', '<p>Shortest job first</p>\r\n', '<p>Round robin</p>\r\n', '<p>First com first serve</p>\r\n', '<p>Elevator</p>\r\n', '2', 10, 19, '2'),
(31, '<p>The simplest way to break a deadlock is to<br />\r\n&nbsp;</p>\r\n', '<p>Kill one of the processes</p>\r\n', '<p>Roll back</p>\r\n', '<p>Preempt a resource</p>\r\n', '<p>Lock one of the processes</p>\r\n', '2', 10, 19, '1'),
(32, '<p>System generation:<br />\r\n&nbsp;</p>\r\n', '<p>is always quite simple</p>\r\n', '<p>is always very difficult</p>\r\n', '<p>varies in difficulty between systems</p>\r\n', '<p>requires extensive tools to be understandable</p>\r\n', '2', 10, 19, '3'),
(33, '<p>The Memory Address Register<br />\r\n&nbsp;</p>\r\n', '<p>is a hardware memory device which denotes the location of the current instructionbeing executed.</p>\r\n', '<p>is a group of electrical circuits (hardware), that performs the intent of instructions fetched from memory.</p>\r\n', '<p>contains the address of the memory location that is to be read from or stored into.</p>\r\n', '<p>contains a copy of the designated memory location specified by the MAR after a &quot;read&quot; or the new contents of the memory prior to a &quot;write&quot;.</p>\r\n', '2', 10, 19, '3'),
(34, '<p>In priority scheduling algorithm, when a process arrives at the ready queue, its priority is compared with the priority of<br />\r\n&nbsp;</p>\r\n', '<p>all process</p>\r\n', '<p>currently running process</p>\r\n', '<p>parent process</p>\r\n', '<p>init process</p>\r\n', '2', 10, 19, '2'),
(35, '<p>Time quantum is defined in<br />\r\n&nbsp;</p>\r\n', '<p>shortest job scheduling algorithm</p>\r\n', '<p>round robin scheduling algorithm</p>\r\n', '<p>priority scheduling algorithm</p>\r\n', '<p>multilevel queue scheduling algorithm</p>\r\n', '2', 10, 19, '2'),
(36, '<p>Process are classified into different groups in<br />\r\n&nbsp;</p>\r\n', '<p>shortest job scheduling algorithm</p>\r\n', '<p>round robin scheduling algorithm</p>\r\n', '<p>priority scheduling algorithm</p>\r\n', '<p>multilevel queue scheduling algorithm</p>\r\n', '2', 10, 19, '4'),
(37, '<p>In multilevel feedback scheduling algorithm<br />\r\n&nbsp;</p>\r\n', '<p>a process can move to a different classified ready queue</p>\r\n', '<p>classification of ready queue is permanent</p>\r\n', '<p>processes are not classified into groups</p>\r\n', '<p>none of the above</p>\r\n', '2', 10, 19, '1'),
(38, '<p>Which one of the following can not be scheduled by the kernel?</p>\r\n', '<p>kernel level thread<br />\r\n&nbsp;</p>\r\n', '<p>user level thread</p>\r\n', '<p>process</p>\r\n', '<p>none of the above</p>\r\n', '2', 10, 19, '2'),
(39, '<p>For a Hold and wait condition to prevail :<br />\r\n&nbsp;</p>\r\n', '<p>A process must be not be holding a resource, but waiting for one to be freed, and then request to acquire it</p>\r\n', '<p>A process must be holding at least one resource and waiting to acquire additional resources that are being held by other processes</p>\r\n', '<p>A process must hold at least one resource and not be waiting to acquire additional resources</p>\r\n', '<p>None of these</p>\r\n', '2', 10, 19, '2'),
(40, '<p>To ensure no preemption, if a process is holding some resources and requests another resource that cannot be immediately allocated to it :<br />\r\n&nbsp;</p>\r\n', '<p>then the process waits for the resources be allocated to it</p>\r\n', '<p>the process keeps sending requests until the resource is allocated to it</p>\r\n', '<p>the process resumes execution without the resource being allocated to it</p>\r\n', '<p>then all resources currently being held are preempted</p>\r\n', '2', 10, 19, '4'),
(41, '<p>One way to ensure that the circular wait condition never holds is to :<br />\r\n&nbsp;</p>\r\n', '<p>impose a total ordering of all resource types and to determine whether one precedes another in the ordering</p>\r\n', '<p>to never let a process acquire resources that are held by other processes</p>\r\n', '<p>to let a process wait for only one resource at a time</p>\r\n', '<p>All of the above</p>\r\n', '3', 10, 19, '1'),
(42, '<p>_____ is the concept in which a process is copied into main memory from the secondary memory according to the requirement.<br />\r\n&nbsp;</p>\r\n', '<p>Paging</p>\r\n', '<p>Demand paging</p>\r\n', '<p>Segmentation</p>\r\n', '<p>Swapping</p>\r\n', '3', 10, 19, '2'),
(43, '<p>______ is a unique tag, usually a number, identifies the file within the file system.<br />\r\n&nbsp;</p>\r\n', '<p>File identifier</p>\r\n', '<p>File name</p>\r\n', '<p>File type</p>\r\n', '<p>none of the above</p>\r\n', '3', 10, 19, '1'),
(44, '<p>Mapping of file is managed by<br />\r\n&nbsp;</p>\r\n', '<p>file metadata</p>\r\n', '<p>page table</p>\r\n', '<p>virtual memory</p>\r\n', '<p>file system</p>\r\n', '3', 10, 19, '1'),
(45, '<p>file system fragmentation occurs when<br />\r\n&nbsp;</p>\r\n', '<p>unused space or single file are not contiguous</p>\r\n', '<p>used space is not contiguous</p>\r\n', '<p>unused space is non-contiguous</p>\r\n', '<p>multiple files are non-contiguous</p>\r\n', '3', 10, 19, '1'),
(46, '<p>The entry of all the PCBs of the current processes is in :<br />\r\n&nbsp;</p>\r\n', '<p>Process Register</p>\r\n', '<p>Program Counter</p>\r\n', '<p>Process Table</p>\r\n', '<p>Process Unit</p>\r\n', '3', 10, 19, '1'),
(47, '<p>When a page fault occurs before an executing instruction is complete :<br />\r\n&nbsp;</p>\r\n', '<p>the instruction must be restarted</p>\r\n', '<p>the instruction must be ignored</p>\r\n', '<p>the instruction must be completed ignoring the page fault</p>\r\n', '<p>none of the above</p>\r\n', '3', 10, 19, '1'),
(48, '<p>A relationship between processes such that each has some part (critical section) which must not be executed while the critical section of another is being executed, is known as<br />\r\n&nbsp;</p>\r\n', '<p>semaphore</p>\r\n', '<p>mutual exclusion</p>\r\n', '<p>multiprogramming</p>\r\n', '<p>multitasking</p>\r\n', '3', 10, 19, '2'),
(49, '<p>What is the name of the operating system which was originally designed by scientists and engineers for use by scientists and engineers?<br />\r\n&nbsp;</p>\r\n', '<p>&nbsp;XENIX</p>\r\n', '<p>UNIX</p>\r\n', '<p>OS/2</p>\r\n', '<p>None of the above</p>\r\n', '3', 10, 19, '2'),
(50, '<p>The most common security failure is<br />\r\n&nbsp;</p>\r\n', '<p>carelessness by users</p>\r\n', '<p>depending on passwords</p>\r\n', '<p>too much emphasis on preventing physical access</p>\r\n', '<p>none of the above</p>\r\n', '3', 10, 19, '1'),
(51, '<p>Terminal Table<br />\r\n&nbsp;</p>\r\n', '<p>contains all constants in the program</p>\r\n', '<p>&nbsp;a permanent table of decision rules in the form of patterns for matching with the uniform symbol table to discover syntactic structure.</p>\r\n', '<p>consists of a full or partial list of the token&#39;s as they appear in the program. Created by Lexical analysis and used for syntax analysis and interpretation</p>\r\n', '<p>&nbsp;a permanent table which lists all key words and special symbols of the language in symbolic form.</p>\r\n', '3', 10, 19, '4'),
(52, '<p>Block or buffer caches are used<br />\r\n&nbsp;</p>\r\n', '<p>to improve disk performance</p>\r\n', '<p>to handle interrupts</p>\r\n', '<p>to increase the capacity of main memory</p>\r\n', '<p>to speed up main memory read operation</p>\r\n', '3', 10, 19, '1'),
(53, '<p>The algorithm in which we split m frames among n processes, to give everyone an equal share, m/n frames is known as :<br />\r\n&nbsp;</p>\r\n', '<p>proportional allocation algorithm</p>\r\n', '<p>equal allocation algorithm</p>\r\n', '<p>split allocation algorithm</p>\r\n', '<p>None of the above</p>\r\n', '3', 10, 19, '2'),
(54, '<p>The number of processes completed per unit time is known as.... ?<br />\r\n&nbsp;</p>\r\n', '<p>Output</p>\r\n', '<p>Throughput</p>\r\n', '<p>Efficiency</p>\r\n', '<p>Capacity</p>\r\n', '3', 10, 19, '2'),
(55, '<p>To avoid the race condition, the number of processes that may be simultaneously inside their critical section is<br />\r\n&nbsp;</p>\r\n', '<p>8</p>\r\n', '<p>1</p>\r\n', '<p>16</p>\r\n', '<p>0</p>\r\n', '3', 10, 19, '1'),
(56, '<p>To protect system,there are how many security levels?<br />\r\n&nbsp;</p>\r\n', '<p>1</p>\r\n', '<p>2</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '3', 10, 19, '3'),
(57, '<p>A major security problem for operating system is<br />\r\n&nbsp;</p>\r\n', '<p>Authentication problem</p>\r\n', '<p>Physical problem</p>\r\n', '<p>Human problem</p>\r\n', '<p>None of the above</p>\r\n', '3', 10, 19, '1'),
(58, '<p>Which command is used to see the sub-directory structure of drive?<br />\r\n&nbsp;</p>\r\n', '<p>Tree</p>\r\n', '<p>List</p>\r\n', '<p>Subtree</p>\r\n', '<p>None</p>\r\n', '3', 10, 19, '1'),
(59, '<p>______ is a high level abstraction over Semaphore.<br />\r\n&nbsp;</p>\r\n', '<p>Shared memory</p>\r\n', '<p>Monitor</p>\r\n', '<p>Mutual Exclusion</p>\r\n', '<p>None of the above</p>\r\n', '3', 10, 19, '2'),
(60, '<p>A tree sturctured file directory system<br />\r\n&nbsp;</p>\r\n', '<p>allows easy storage and retrieval of file names</p>\r\n', '<p>is a much debated unecessary feature</p>\r\n', '<p>is not essential when we have millions of files</p>\r\n', '<p>none of the above</p>\r\n', '3', 10, 19, '1'),
(61, '<p>In analyzing the compilation of PL/I program, the term &quot;Syntax analysis&quot; is associated with<br />\r\n&nbsp;</p>\r\n', '<p>recognition of basic syntactic constructs through reductions</p>\r\n', '<p>recognition of basic elements and creation of uniform symbols</p>\r\n', '<p>creation of more optional matrix.</p>\r\n', '<p>none of the above</p>\r\n', '4', 10, 19, '1'),
(62, '<p>A hardware device that is capable of executing a sequence of instructions, is known as<br />\r\n&nbsp;</p>\r\n', '<p>CPU</p>\r\n', '<p>ALU</p>\r\n', '<p>CU</p>\r\n', '<p>Processor</p>\r\n', '4', 10, 19, '4'),
(63, '<p>Which of following is/are the advantage(s) of modular programming?<br />\r\n&nbsp;</p>\r\n', '<p>The program is much easier to change</p>\r\n', '<p>Modules can be reused in other programs</p>\r\n', '<p>Easy debugging</p>\r\n', '<p>Easy to compile</p>\r\n', '4', 10, 19, '1'),
(64, '<p>The function(s) performed by the paging software is (are)<br />\r\n&nbsp;</p>\r\n', '<p>&nbsp;Implementation of the access environment for all programs in the system</p>\r\n', '<p>Management of the physical address space</p>\r\n', '<p>Sharing and protection</p>\r\n', '<p>All the above</p>\r\n', '4', 10, 19, '4'),
(65, '<p>A compiler for a high-level language that runs on one machine and produces code for a different machine is called is<br />\r\n&nbsp;</p>\r\n', '<p>optimizing compiler</p>\r\n', '<p>one pass compiler</p>\r\n', '<p>cross compiler</p>\r\n', '<p>multipass compiler</p>\r\n', '4', 10, 19, '3'),
(66, '<p>Round robin scheduling is essentially the preemptive version of ________.<br />\r\n&nbsp;</p>\r\n', '<p>FIFO</p>\r\n', '<p>Shortest job first</p>\r\n', '<p>Shortest remaining</p>\r\n', '<p>Longest time first</p>\r\n', '4', 10, 19, '1'),
(67, '<p>Which directory implementation is used in most Operating System?<br />\r\n&nbsp;</p>\r\n', '<p>Single level directory structure</p>\r\n', '<p>Two level directory structure</p>\r\n', '<p>Tree directory structure</p>\r\n', '<p>Acyclic directory structure</p>\r\n', '4', 10, 19, '3'),
(68, '<p>The mechanism that bring a page into memory only when it is needed is called _____________<br />\r\n&nbsp;</p>\r\n', '<p>Sagmentation</p>\r\n', '<p>Fragmentation</p>\r\n', '<p>Demand Paging</p>\r\n', '<p>Page and Replacement</p>\r\n', '4', 10, 19, '3'),
(69, '<p>The part of machine level instruction, which tells the central processor what has to be done, is<br />\r\n&nbsp;</p>\r\n', '<p>Operation code</p>\r\n', '<p>address</p>\r\n', '<p>Locator</p>\r\n', '<p>Flip flop</p>\r\n', '4', 10, 19, '1'),
(70, '<p>Which of the following disk scheduling strategies is likely to give the best throughput ?<br />\r\n&nbsp;</p>\r\n', '<p>Farthest cylinder next</p>\r\n', '<p>Nearest Cylinder next</p>\r\n', '<p>FCFS</p>\r\n', '<p>Elevator algorithm</p>\r\n', '4', 10, 19, '1'),
(71, '<p>Which of the following algorithm suffers from the Belady&#39;s anomly ?<br />\r\n&nbsp;</p>\r\n', '<p>FIFO</p>\r\n', '<p>LIFO</p>\r\n', '<p>Optimal Algorithm</p>\r\n', '<p>None of the above</p>\r\n', '4', 10, 19, '1'),
(72, '<p>Aging is a technique ?<br />\r\n&nbsp;</p>\r\n', '<p>Used to increase the priority of processed that are waiting for long times</p>\r\n', '<p>Used to decrease the priority that are waiting for long time</p>\r\n', '<p>Used to increase the priority of processed that are currently running</p>\r\n', '<p>Used to decrease the priority processes that are currently running</p>\r\n', '4', 10, 19, '1'),
(73, '<p>What is Page stealing ?<br />\r\n&nbsp;</p>\r\n', '<p>It takes page frames from other working sets</p>\r\n', '<p>To increase the capacity of main memory</p>\r\n', '<p>To speed up main memory read operation</p>\r\n', '<p>None of the above</p>\r\n', '4', 10, 19, '1'),
(74, '<p>When size of the memory is increased the page replacement policy that sometimes leads to more page faults is called _________ .</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>FIFO</p>\r\n', '<p>Optimal</p>\r\n', '<p>LRU</p>\r\n', '<p>None of the above</p>\r\n', '4', 10, 19, '1'),
(75, '<p>Routine is not loaded until it is called. All routines are kept on disk in a relocatable load format. The main program is loaded into memory &amp; is executed. This type of loading is called... ?&nbsp;<br />\r\n&nbsp;</p>\r\n', '<p>Static loading</p>\r\n', '<p>Dynamic loading</p>\r\n', '<p>Dynamic linking</p>\r\n', '<p>Overlays</p>\r\n', '4', 10, 19, '3'),
(76, '<p>In the blocked state ?&nbsp;<br />\r\n&nbsp;</p>\r\n', '<p>the processes waiting for I/O are found</p>\r\n', '<p>the process which is running is found</p>\r\n', '<p>the processes waiting for the processor are found</p>\r\n', '<p>None of the above</p>\r\n', '4', 10, 19, '1'),
(77, '<p>What must reside in the main memory under all situations in a resident - OS computer?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Linker</p>\r\n', '<p>Loader</p>\r\n', '<p>Assembler</p>\r\n', '<p>Compiler</p>\r\n', '4', 10, 19, '2'),
(78, '<p>CPU can access which type of memory directly?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>random-access memory</p>\r\n', '<p>&nbsp;magnetic disk</p>\r\n', '<p>magnetic tape</p>\r\n', '<p>none of the above</p>\r\n', '4', 10, 19, '1'),
(79, '<p>It is not possible to have a deadlock involving only a single process. Why?<br />\r\n&nbsp;</p>\r\n', '<p>This follows directly from the hold-and-wait condition</p>\r\n', '<p>This holds mutual exclusion, hold-and-wait and non-preemption</p>\r\n', '<p>Because single process not always in safe state</p>\r\n', '<p>None of the above</p>\r\n', '4', 10, 19, '1'),
(80, '<p>Interrupts which are initiated by an instruction are</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Internal</p>\r\n', '<p>External</p>\r\n', '<p>Hardware</p>\r\n', '<p>Software</p>\r\n', '4', 10, 19, '4'),
(81, '<p>What is the memory from 1K - 640K called ?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Extended Memory</p>\r\n', '<p>Normal Memory</p>\r\n', '<p>Low Memory</p>\r\n', '<p>Conventional Memory</p>\r\n', '5', 10, 19, '4'),
(82, '<p>What is convoy effect ?<br />\r\n&nbsp;</p>\r\n', '<p>All process waiting for the long process to complete</p>\r\n', '<p>All process waiting for the small process to complete</p>\r\n', '<p>Process in not present in main memory</p>\r\n', '<p>None of the above</p>\r\n', '5', 10, 19, '1'),
(83, '<p>In wildcard specification `?&#39; is used as replacement for<br />\r\n&nbsp;</p>\r\n', '<p>one character</p>\r\n', '<p>two charactors</p>\r\n', '<p>three charactors</p>\r\n', '<p>none of the above</p>\r\n', '5', 10, 19, '1'),
(84, '<p>Which of the following refers to the associative memory?<br />\r\n&nbsp;</p>\r\n', '<p>the address of the data is generated by the CPU</p>\r\n', '<p>the address of the data is supplied by the users</p>\r\n', '<p>there is no need for an address i.e. the data is used as an address</p>\r\n', '<p>the data are accessed sequentially</p>\r\n', '5', 10, 19, '3'),
(85, '<p>A system program that combines the separately compiled modules of a program into a form suitable for execution<br />\r\n&nbsp;</p>\r\n', '<p>assembler</p>\r\n', '<p>linking loader</p>\r\n', '<p>cross compiler</p>\r\n', '<p>load and go</p>\r\n', '5', 10, 19, '2'),
(86, '<p>Which scheduler performs the &quot;swapping out&quot; or &quot;swapping in&quot;?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Long-term scheduling</p>\r\n', '<p>Medium-term scheduling</p>\r\n', '<p>Short-term scheduling</p>\r\n', '<p>None of the above</p>\r\n', '5', 10, 19, '2'),
(87, '<p>Which technique is used to temporarily removing non-active programs from the memory of computer system?&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Swapping</p>\r\n', '<p>Spooling</p>\r\n', '<p>Scheduler</p>\r\n', '<p>None of the above</p>\r\n', '5', 10, 19, '1'),
(88, '<p>What is page cannibalizing?</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n', '<p>Page swapping or Page replacements</p>\r\n', '<p>&nbsp;Adding timestamps to the page</p>\r\n', '<p>Avoiding page replacements</p>\r\n', '<p>All the above</p>\r\n', '1', 10, 19, '1'),
(89, '<p>From the following statements which one is not a valid deadlock prevention scheme?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Number the resources uniquely and never request a lower numbered resource than the last one</p>\r\n', '<p>&nbsp;Release all the resources before requesting for a new resource</p>\r\n', '<p>Request all the resources before execution</p>\r\n', '<p>&nbsp;Never request a resource after releasing any resources</p>\r\n', '5', 10, 19, '4'),
(90, '<p>Which of the following helps a system call to invoke?</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n', '<p>&nbsp;Polling</p>\r\n', '<p>&nbsp;A software interrupt</p>\r\n', '<p>Call function</p>\r\n', '<p>&nbsp;Queues</p>\r\n', '5', 10, 19, '2'),
(91, '<p>Operating System: Which RAID level refers to disk mirroring?</p>\r\n', '<p>0</p>\r\n', '<p>1</p>\r\n', '<p>2</p>\r\n', '<p>3</p>\r\n', '5', 10, 19, '2'),
(92, '<p>The optimal page replacement algorithm will select the page that</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>has been used least number of times.</p>\r\n', '<p>has been used most number of times.</p>\r\n', '<p>has been used for the longest time in the past.</p>\r\n', '<p>will not be used for the longest time in future.</p>\r\n', '5', 8, 19, '4'),
(93, '<p>The address generated by the CPU is referred to as:&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>physical address</p>\r\n', '<p>&nbsp;logical address</p>\r\n', '<p>physical as well as logical address.</p>\r\n', '<p>none of the above</p>\r\n', '5', 7, 19, '2'),
(94, '<p>In virtual memory systems, Dynamic address translation<br />\r\n&nbsp;</p>\r\n', '<p>is the hardware necessary to implement paging</p>\r\n', '<p>stores pages at a specific location on disk</p>\r\n', '<p>&nbsp;is useless when swapping is used</p>\r\n', '<p>&nbsp;is part of the operating system paging algorithm</p>\r\n', '5', 10, 19, '1'),
(95, '<p>Fragmentation of the file system<br />\r\n&nbsp;</p>\r\n', '<p>occurs only if the file system is used improperly</p>\r\n', '<p>can always be prevented</p>\r\n', '<p>can be temporarily removed by compaction</p>\r\n', '<p>&nbsp;is a characteristic of all file systems</p>\r\n', '5', 10, 19, '3'),
(96, '<p>A non-relocatable program is one which<br />\r\n&nbsp;</p>\r\n', '<p>cannot be made to execute in any area of storage other than the one designated for it at the time of its coding or translation.</p>\r\n', '<p>&nbsp;consists of a program and relevant information for its relocation.</p>\r\n', '<p>&nbsp;can itself performs the relocation of its address-sensitive portions.</p>\r\n', '<p>all the above</p>\r\n', '6', 10, 19, '3'),
(97, '<p>Which of the following are(is) Language Processor(s)<br />\r\n&nbsp;</p>\r\n', '<p>assembles</p>\r\n', '<p>compilers</p>\r\n', '<p>&nbsp;interpreters</p>\r\n', '<p>all the above</p>\r\n', '6', 10, 19, '4'),
(98, '<p>In which addressing mode the effective address of the operand is the contents of a register specified in the instruction and after accessing the operand, the contents of this register is incremented to point to the next item in the list?<br />\r\n&nbsp;</p>\r\n', '<p>index addressing</p>\r\n', '<p>indirect addressing</p>\r\n', '<p>auto increment</p>\r\n', '<p>auto decrement</p>\r\n', '6', 10, 19, '3'),
(99, '<p>Consider a computer system with 6 tape drives and &#39;n&#39; processes completing for them. What is the maximum value of &#39;n&#39; for the system to be deadlock free? (Assuming that each processes may need 3 tape drives)</p>\r\n', '<p>3</p>\r\n', '<p>2</p>\r\n', '<p>4</p>\r\n', '<p>7</p>\r\n', '6', 10, 19, '2'),
(100, '<p>What is the use of thrashing?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>&nbsp;It improves system performance</p>\r\n', '<p>&nbsp;It implies excessive page I/O</p>\r\n', '<p>&nbsp;It decreases the degree of multiprogramming</p>\r\n', '<p>&nbsp;It reduces page I/O</p>\r\n', '6', 5, 19, '3'),
(101, '<p>What will a simple two pass assembler do in the first pass?</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n', '<p>&nbsp;It will allocate space for the literals.</p>\r\n', '<p>&nbsp;It will generate the code for all the load and store register instruction.</p>\r\n', '<p>&nbsp;It will build the symbol table for the symbols and their values.</p>\r\n', '<p>&nbsp;It will compute the total length of the program</p>\r\n', '6', 8, 19, '1'),
(102, '<p>Consider the following statements:</p>\r\n\r\n<p>a. With the use of kernel supported threads context switch is faster.<br />\r\nb. The entire process can be blocked by the system for user - level threads.<br />\r\nc. Kernel supported threads can be scheduled independently.<br />\r\nd. User level threads are transparent to the kernel.</p>\r\n\r\n<p>Which of the above statements are true?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>&nbsp;a and d</p>\r\n', '<p>a and b</p>\r\n', '<p>&nbsp;b and c</p>\r\n', '<p>a and c</p>\r\n', '6', 10, 19, '3'),
(103, '<p>A system has &#39;m&#39; number of resources of same type and 3 processes A, B, C. Share these resources A, B, C which have the peak demand of 3, 4 and 6 respectively. Deadlock will not occur if the value of &#39;m&#39; is __________.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>m = 15</p>\r\n', '<p>m = 8</p>\r\n', '<p>m = 13</p>\r\n', '<p>m = 9</p>\r\n', '6', 20, 19, '3'),
(104, '<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="text-align:center">Process</td>\r\n			<td style="text-align:center">Arrival time&nbsp;</td>\r\n			<td style="text-align:center">Burst time</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">P0</td>\r\n			<td style="text-align:center">0</td>\r\n			<td style="text-align:center">5</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">P1</td>\r\n			<td style="text-align:center">1</td>\r\n			<td style="text-align:center">7</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">P2</td>\r\n			<td style="text-align:center">3</td>\r\n			<td style="text-align:center">4</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>In the given table it shows P1, P2 and P3 are the three processes.<br />\r\nWhat is the completion order of the 3 processes under the policies First Come First Serve(FCFS) and Round Robin Scheduling? (RRS with CPU quantum time of 2 units)</p>\r\n\r\n<p>&nbsp;<br />\r\n&nbsp;</p>\r\n', '<p>&nbsp;FCFS: P1, P2, P3 RR2: P1, P3, P2</p>\r\n', '<p>&nbsp;FCFS: P1, P3, P2 RR2: P1, P2, P3</p>\r\n', '<p>&nbsp;FCFS: P1, P3, P2 RR2: P1, P3, P2</p>\r\n', '<p>FCFS: P1, P2, P3 RR2: P1, P2, P3</p>\r\n', '6', 200, 19, '1'),
(105, '<p>What is said to happen when the result of computation depends on the speed of the processes involved?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>A deadlock</p>\r\n', '<p>A time lock</p>\r\n', '<p>&nbsp;Cycle stealing</p>\r\n', '<p>&nbsp;Race condition</p>\r\n', '6', 8, 19, '4'),
(106, '<p>Consider a counting semaphore which was initialized to 10 and then 6P (wait) operations and 4v(signal) operations were completed on this semaphore. What is the resulting value of semaphore?</p>\r\n', '<p>10</p>\r\n', '<p>9</p>\r\n', '<p>8</p>\r\n', '<p>0</p>\r\n', '6', 30, 19, '3'),
(107, '<p>A process executes the code,</p>\r\n\r\n<p>fork();<br />\r\nfork();<br />\r\nfork();</p>\r\n\r\n<p>How many child processes are created?<br />\r\n&nbsp;</p>\r\n', '<p>5</p>\r\n', '<p>8</p>\r\n', '<p>7</p>\r\n', '<p>9</p>\r\n', '6', 20, 19, '3'),
(108, '<p>Why is the Software interrupt required by the processor?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Return from subroutine.</p>\r\n', '<p>Obtain system services, which need execution of privileged instruction.</p>\r\n', '<p>Test the interrupt system of the processor.</p>\r\n', '<p>Implement co-routines.</p>\r\n', '6', 10, 19, '2'),
(109, '<p>A machine has a physical memory of 64 Mbyte and a virtual address space of 32 - bit. The page size is 4kbyte, What is the approximate size of the page table?</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n', '<p>&nbsp;24 Mbyte</p>\r\n', '<p>&nbsp;16 Mbyte</p>\r\n', '<p>2&nbsp;Mbyte</p>\r\n', '<p>8 Mbyte</p>\r\n', '6', 15, 19, '3'),
(110, '<p>We have three processes P0, P1 and P2 whose arrival time and burst time are given below.</p>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="text-align: center;">Process</td>\r\n			<td style="text-align: center;">Arrival time&nbsp;</td>\r\n			<td style="text-align: center;">Burst Time</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align: center;">P0</td>\r\n			<td style="text-align: center;">0ms</td>\r\n			<td style="text-align: center;">9ms</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align: center;">P1</td>\r\n			<td style="text-align: center;">1ms</td>\r\n			<td style="text-align: center;">4ms</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align: center;">P2</td>\r\n			<td style="text-align: center;">2ms</td>\r\n			<td style="text-align: center;">9ms</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>If the preemptive Shortest Job First (SJF) scheduling algorithm is carried out only at arrival or completion of processes then the average waiting time for the three processes is ________.</p>\r\n\r\n<p>&nbsp;<br />\r\n&nbsp;</p>\r\n', '<p>7.33ms</p>\r\n', '<p>6.33ms</p>\r\n', '<p>5ms</p>\r\n', '<p>4.33ms</p>\r\n', '6', 200, 19, '3'),
(111, '<p>Which of the following statements is not true for the deadlock prevention and deadlock avoidance schemes?&nbsp;</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n', '<p>&nbsp;Deadlock avoidance is less restrictive than deadlock prevention</p>\r\n', '<p>&nbsp;In deadlock prevention, the request for resources is always granted, if the resulting state is safe.</p>\r\n', '<p>&nbsp;It is the priority to have the knowledge of resource requirements for deadlock avoidance.</p>\r\n', '<p>In deadlock avoidance, the request for resources is always granted, if the resulting state is safe.</p>\r\n', '7', 8, 19, '4'),
(112, '<p>We have a CPU that generates virtual addresses of 32 bits and the page size is of 4 kbyte. Transition Lookaside Buffer ( TLB ) of the processor can hold a total of 128 page table entries and 4 - way set associative. What is the minimum size of the TLB tag?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>16 bit</p>\r\n', '<p>20 bit</p>\r\n', '<p>11 bit</p>\r\n', '<p>15 bit</p>\r\n', '7', 20, 19, '4'),
(113, '<p>Consider a virtual memory system that uses First In First Out (FIFO) page replacement policy and it allocates a fixed number of frames to a process. Consider the following two statements,</p>\r\n\r\n<p>1: Sometimes the page fault rate is increased if the number of page frames allocated is increased.<br />\r\n2: Some programs do not exhibit Locality of reference.</p>\r\n\r\n<p>Which of the following is true?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>1 is false and 2 is true</p>\r\n', '<p>&nbsp;both 1 and 2 are false</p>\r\n', '<p>both 1 and 2 are true but 2 is not the reason for 1</p>\r\n', '<p>both 1 and 2 are true and 2 is the reason for 1</p>\r\n', '7', 15, 19, '3'),
(114, '<p>Why do we translate a virtual address to physical address where a multilevel page table is preferred in comparison to a single level page table?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>&nbsp;It is required by the translation look-aside buffer</p>\r\n', '<p>&nbsp;It helps to reduce the memory access time to read or write a memory location</p>\r\n', '<p>It helps to reduce the number of page faults in page replacement algorithm</p>\r\n', '<p>&nbsp;It helps to reduce the size of a page table needed to implement the virtual address space of a process</p>\r\n', '7', 10, 19, '4'),
(115, '<p>OS: If the disk head is located initially at 32, find the number of disk moves required with FCFS if the disk queue of I/O blocks requests are 98, 37, 14, 124, 65, 70.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>320</p>\r\n', '<p>321</p>\r\n', '<p>324</p>\r\n', '<p>none of the above</p>\r\n', '7', 150, 19, '3'),
(116, '<p>The maximum amount of information that is available in one portion of the disk access arm for a removal disk pack (without further movement of the arm with multiple heads)<br />\r\n&nbsp;</p>\r\n', '<p>A cylinder of data</p>\r\n', '<p>A track of data</p>\r\n', '<p>A block of data</p>\r\n', '<p>A plate of Data</p>\r\n', '7', 5, 19, '1'),
(117, '<p>Match the following:<br />\r\nList &ndash; I - - - - - - - - - - - - - - - - - - - - - - - - - List &ndash; II<br />\r\na. Multilevel feedback queue - - - - - - - - - i. Time-slicing<br />\r\nb. FCFS - - - - - - - - - - - - - - - - - - - - - - - -ii. Criteria to move processes between queues<br />\r\nc. Shortest process next - - - - - - - - - - - -iii. Batch processing<br />\r\nd. Round robin scheduling - - - - - - - - - - -iv. Exponential smoothing</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>&nbsp;a-i, b-iii, c-ii, d-iv</p>\r\n', '<p>&nbsp;a-iv, b-iii, c-ii, d-i</p>\r\n', '<p>a-iii, b-i, c-iv, d-i</p>\r\n', '<p>a-ii, b-iii, c-iv, d-i<br />\r\n&nbsp;</p>\r\n', '7', 15, 19, '4'),
(118, '<p>An application loads 100 libraries at startup and loading each library exactly one disk access is required. 10ms is the seek time of the disk to a random location and 6000rpm is the rotational speed of the disk. Neglect the time to transfer data from the disk block once the head has been positioned at the start of the block. What will be the time taken by the application to load all the libraries, if all 100 libraries are loaded from random location on the disk?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>&nbsp;1.50s</p>\r\n', '<p>1s</p>\r\n', '<p>1.87s</p>\r\n', '<p>0.74s</p>\r\n', '7', 30, 19, '1'),
(119, '<p>The program given below consists of three concurrent processes P0, P1, P2 and three binary semaphores with the values S0 = 1, S1 = 0, S2 = 0.&nbsp;<br />\r\nHow many times the process P0 will print &lsquo;0&rsquo; ?<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="text-align:center">Process P0</td>\r\n			<td style="text-align:center">Process P1</td>\r\n			<td style="text-align:center">Process P2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p style="text-align:center">wait(s0);</p>\r\n\r\n			<p style="text-align:center">Print &#39;0&#39;</p>\r\n\r\n			<p style="text-align:center">release(s1);</p>\r\n\r\n			<p style="text-align:center">release(s2);</p>\r\n\r\n			<p style="text-align:center">}</p>\r\n			</td>\r\n			<td>\r\n			<p style="text-align:center">wait(s1);</p>\r\n\r\n			<p style="text-align:center">release(s1);</p>\r\n			</td>\r\n			<td>\r\n			<p style="text-align:center">wait(s2);</p>\r\n\r\n			<p style="text-align:center">release(s0);</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;<br />\r\n&nbsp;</p>\r\n', '<p>At least thrice</p>\r\n', '<p>&nbsp;Exactly thrice</p>\r\n', '<p>&nbsp;At least twice</p>\r\n', '<p>Exactly twice<br />\r\n&nbsp;</p>\r\n', '7', 120, 19, '3'),
(120, '<p>In a virtual memory environment the minimum number of page frames that must be allocated to a running process is determined by ___________________.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>&nbsp;The Number of Processes in the Memory</p>\r\n', '<p>&nbsp;The Instruction Set Architecture</p>\r\n', '<p>&nbsp;The Page Size</p>\r\n', '<p>&nbsp;The Physical Memory Size</p>\r\n', '7', 10, 19, '2'),
(121, '<p>We have an operating system, which is capable of loading and executing a single sequential user process at a time. If the disk head scheduling algorithm which is initially First Come First Served (FCFS) is replaced by Shortest Seek Time First (SSTF) claimed by the vendor to give 50% better benchmark results then what is the expected improvement in the I / O performance of the user programs?&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>&nbsp;0%</p>\r\n', '<p>&nbsp;25%</p>\r\n', '<p>&nbsp;50%</p>\r\n', '<p>&nbsp;75%</p>\r\n', '8', 20, 19, '1'),
(122, '<p>What is the effect of using a larger block size in a fixed block size file system?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>&nbsp;It leads to poorer disk throughput and poorer disk space utilization</p>\r\n', '<p>It leads to poorer disk throughput but better disk space utilization</p>\r\n', '<p>It leads to better disk throughput and better disk space utilization</p>\r\n', '<p>It leads to better disk throughput and poorer disk space utilization</p>\r\n', '8', 10, 19, '4'),
(123, '<p>Consider a system with 32 bit virtual addresses and 1 kbyte page size. Why is it not possible to use one - level page tables for virtual to physical address translation?</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n', '<p>&nbsp;The amount of external fragmentation</p>\r\n', '<p>&nbsp;The amount of internal fragmentation</p>\r\n', '<p>The large computation overhead in the translation process</p>\r\n', '<p>The large memory overhead in maintaining page tables<br />\r\n&nbsp;</p>\r\n', '8', 10, 19, '4'),
(124, '<p>We have a uniprocessor machine where a set of n tasks with known run times r1, r2, r3,&hellip;.rn are to be run. What will be the maximum throughput result of the processor scheduling algorithm?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>&nbsp;Shortest Job First</p>\r\n', '<p>First Come First Served</p>\r\n', '<p>Round Robin</p>\r\n', '<p>&nbsp;Highest Response Ratio Next</p>\r\n', '8', 20, 19, '1'),
(125, '<p>Three CPU intensive processes requires 10, 20 and 30 time units and arrive at times 0, 2 and 6 respectively. The operating system implements a shortest remaining time first scheduling algorithm. Considering that the context switches at time zero and at the end are not counted the number of context switches are needed is ______.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>4</p>\r\n', '<p>3</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', '8', 20, 19, '3'),
(126, '<p>The capacity of a memory unit = (the number of words) * (the number of bits / words). What will be the number of separate address and data lines needed for a memory of 4k * 16 ?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>&nbsp;12 address and 16 data lines</p>\r\n', '<p>12 address and 12 data lines</p>\r\n', '<p>&nbsp;11 address and 6 data lines</p>\r\n', '<p>12 address and 8 data lines</p>\r\n', '8', 15, 19, '1'),
(127, '<p>Which of the following statements is true for the dirty page in a page table?&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Helps to maintain LRU information</p>\r\n', '<p>Allows only read on a page</p>\r\n', '<p>&nbsp;Helps to avoid unnecessary writes on paging device</p>\r\n', '<p>None of the above</p>\r\n', '8', 8, 19, '3'),
(128, '<p>An operating system maintains smaller data structures for a thread than a process, as a thread is usually defined as a &lsquo; light weight process &rsquo;. What is the per thread basis of the operating system?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Does not maintain a separate stack</p>\r\n', '<p>Maintains only CPU register state.</p>\r\n', '<p>&nbsp;Does not maintain a virtual memory state</p>\r\n', '<p>Maintains only scheduling and accounting information</p>\r\n', '8', 10, 19, '4'),
(129, '<p>We have a process that has been allocated 3 page frames and initially none of the pages of the process are available in the memory. The following sequence of page references (reference string) is made by the process :&nbsp;<br />\r\n1, 2, 1, 3, 7, 4, 5, 6, 3, 1<br />\r\nHow many page faults will occur for the above reference string with the Least Recently Used(LRU) Page Replacement Policy in comparison to an Optimal Page Replacement policy?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>3</p>\r\n', '<p>2</p>\r\n', '<p>1</p>\r\n', '<p>0</p>\r\n', '8', 120, 19, '2'),
(130, '<p>A program is executing in a pure demand paging system with 100 records per page with 1 free main memory frame. The address sequence that is generated by tracing this program is recorded as follows,<br />\r\n0100, 0200, 0430, 0499, 0510, 0530, 0560, 0120, 0220, 0240, 0260, 0320, 0370<br />\r\nWhat are the number of page faults?</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>8</p>\r\n', '<p>11</p>\r\n', '<p>7</p>\r\n', '<p>12</p>\r\n', '8', 180, 19, '3'),
(131, '<p>We have a process that has been allocated 3 page frames and initially none of the pages of the process are available in the memory. The following sequence of page references (reference string) is made by the process :&nbsp;<br />\r\n1, 2, 1, 3, 7, 4, 5, 6, 3, 1<br />\r\nIf Optimal Page Replacement policy is used, _______ page faults will occur for the above reference string.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>7</p>\r\n', '<p>8</p>\r\n', '<p>9</p>\r\n', '<p>6</p>\r\n', '8', 120, 19, '1');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `userID` int(5) NOT NULL,
  `questionID` int(5) NOT NULL,
  `answer` enum('1','2','3','4') NOT NULL,
  `score` float NOT NULL,
  `timeConsumed` int(3) NOT NULL,
  `correct` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(5) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `availableForUserDriven` tinyint(1) NOT NULL,
  `compulsorySkill` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `skill`, `availableForUserDriven`, `compulsorySkill`) VALUES
(1, 'Android', -1, 0),
(2, 'Artificial Intelligence', 1, 0),
(3, '	\r\nAutomata (Theory of Computation)', 1, 0),
(4, 'C', 1, 0),
(5, 'C#', 1, 0),
(6, 'C++', 1, 0),
(7, 'Computer Networks', 1, 0),
(8, 'Computer Organization and Architecture', 1, 0),
(9, 'CSS', 1, 0),
(10, 'Cryptography', 1, 0),
(11, 'Data Structure', 1, 0),
(12, 'Database Management', 1, 0),
(13, 'Design and Analysis of Algorithm', 1, 0),
(14, 'Graphic Designing', 1, 0),
(15, 'HTML', 1, 0),
(16, 'Internet of Things', 1, 0),
(17, 'JAVA', 1, 0),
(18, 'JavaScript', 1, 0),
(19, 'Operating Systems', 1, 0),
(20, 'PHP', 1, 0),
(21, 'Python', 1, 0),
(22, '.NET', 1, 0),
(25, 'General Aptitude', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `testSetup`
--

CREATE TABLE `testSetup` (
  `testID` int(2) NOT NULL,
  `skillsAllowed` int(5) NOT NULL,
  `timeAllowed` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testSetup`
--

INSERT INTO `testSetup` (`testID`, `skillsAllowed`, `timeAllowed`) VALUES
(1, 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(5) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `gender` enum('1','2') NOT NULL,
  `password` varchar(255) NOT NULL,
  `collegeID` int(5) NOT NULL,
  `batch` int(5) NOT NULL,
  `courseID` int(5) NOT NULL,
  `registrationLevel` enum('1','2','3') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userSkills`
--

CREATE TABLE `userSkills` (
  `id` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `skillID` int(5) NOT NULL,
  `score` float NOT NULL DEFAULT '0',
  `status` enum('1','2','3','4') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compulsorySkills`
--
ALTER TABLE `compulsorySkills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `testSetup`
--
ALTER TABLE `testSetup`
  ADD PRIMARY KEY (`testID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `userSkills`
--
ALTER TABLE `userSkills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `compulsorySkills`
--
ALTER TABLE `compulsorySkills`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userSkills`
--
ALTER TABLE `userSkills`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
