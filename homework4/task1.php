<?php

interface NumberOfUses
{
    function isUsed();
}
abstract class Book
{

    protected string $title;
    protected string $author;
    protected int $year;

    private int $used;



    public function __construct(string $title, string $author, int $year)
    {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->used = 0;
    }

    public function info(): string
    {
        return "Название: " . $this->title . PHP_EOL . "Автор: " . $this->author . PHP_EOL . "Год издания: " . $this->year . PHP_EOL . "Количество использований: " . $this->used . PHP_EOL;
    }

    protected function numberOfUses()
    {
        $this->used += 1;
    }
}


class DigitalBook extends Book
{

    private string $url;

    public function __construct(string $title, string $author, int $year, string $url)
    {
        parent::__construct($title, $author, $year);
        $this->url = $url;
    }

    public function info(): string
    {
        return parent::info() . "Ссылка на скачивание: " . $this->url . PHP_EOL . PHP_EOL;
    }

    public function isUsed()
    {
        parent::numberOfUses();
    }
}

class RealBook extends Book
{

    private string $location;
    private string $User;

    private int $shelfId;


    public function __construct(string $title, string $author, int $year, int $shelfId)
    {
        parent::__construct($title, $author, $year);
        $this->shelfId = $shelfId;
    }


    public function getByUser(string $userName)
    {
        parent::numberOfUses();
        $this->User = $userName;
    }

    public function inTheLibrary()
    {
        $this->location = "Книга в библиотеке";
    }

    public function userTook()
    {
        $this->location = "Книга у пользователя";
    }


    public function info(): string
    {
        return parent::info() . "Полка № " . $this->shelfId . PHP_EOL . "Местоположение книги: " . $this->location . PHP_EOL . "Текущий пользователь: " . $this->User  . PHP_EOL . PHP_EOL;
    }
}


$book1 = new RealBook(
    "Мастер и Маргарита",
    "Михаил Булгаков",
    1966,
    5
);

$book1->getByUser("Ivan Ivanov");

$book1->inTheLibrary();

echo $book1->info();

$book2 = new DigitalBook(
    "Евгений Онегин",
    "Александр Пушкин",
    1825,
    "www.books.ru"
);
$book2->isUsed();
echo $book2->info();

$book3 = new RealBook(
    "Мёртвые души",
    "Николай Гоголь",
    1842,
    3
);
$book3->getByUser("Petr Petrov");

$book3->userTook();

echo $book3->info();
