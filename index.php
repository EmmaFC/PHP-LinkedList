<?php
// Nodes
class Node {
    
    public $value;
    public $previous;
    public $next;

    public function __construct() 
    {
        $this->value = NULL;
        $this->previous = NULL;
        $this->next = NULL;
    }
}

// Linked List
class LinkedList {

    public $header;

    public function __construct()
    {
        $this->header = new Node ();
    }

    public function findFirst()
    {
        $current = $this->header;

        while ($current->previous != NULL) {
            $current = $current->previous;
        }
        return $current;
    }

    public function findLast()
    {
        $current = $this->header;

        while ($current->next != NULL) 
        {
            $current = $current->next;
        }
        return $current;
    }

    public function push ($item)
    {
        $newNode = New Node ();
        $newNode->value = $item;

        $current = $this->findLast();

        $current->next = $newNode;
        $newNode->previous= $current;
    }

    public function pop ()
    {
        $current = $this->findLast();
        $first = $this->findFirst();

        if ($current != $first)
        {
            $current->previous->next = $current->next;
            return $current->value;
        }
        $current->next = NULL;
        return $current->value;
    }

    public function unshift ($item)
    {
        $newNode = new Node ();
        $newNode->value = $item;

        $current = $this->findFirst();

        if ($current->next != NULL)
        {
            $current->next->previous = $newNode;
        }
            $newNode->next = $current->next;
            $current->next = $newNode;
            $newNode->previous = $current;
    }

    public function shift ()
    {
        $current = $this->findFirst();
        $current = $current->next;
        
        if ($current->next != NULL)
        {
            $current->previous->next = $current->next;
            $current->next->previous = $current->previous;
            return $current->value;
        }     
        $current->previous->next = NULL;
        return $current->value;
    }     

}


$list = new LinkedList();
$list->push(10);
$list->push(20);
$list->push(15); 
$list->displayList();






