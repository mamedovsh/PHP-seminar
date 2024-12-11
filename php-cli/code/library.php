<?php

abstract class Book {
    protected $title;
    protected $author;
    protected $readCount;

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
        $this->readCount = 0;
    }
    abstract public function getOnHand(): string;
    public function incrementReadCount() {
        $this->readCount++;
    }
    public function getReadCount(): int {
        return $this->readCount;
    }
}

class EBook extends Book{
    private $downLoadLink;

    public function __construct($title, $author, $downLoadLink){
    parent::__construct($title,$author);
    $this->downLoadLink = $downLoadLink;
    }

public function getOnHand(): string {
    return "Ссылка на скачивание: " . $this->downLoadLink;
    } 
}

class PaperBook extends Book {
    private $libraryAddress;

    public function __construct($title, $author,$libraryAddress) {
        parent::__construct($title,$author);
        $this->libraryAddress = $libraryAddress;
    }

    public function getOnHand(): string{
        return "Адрес библиотеки: " . $this->libraryAddress;
    }
}

