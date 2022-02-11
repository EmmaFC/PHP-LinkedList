<?php
// clase de nodo
class Node {
         public $data; // datos de nodo
    public $previous;
         public $next; // siguiente nodo

    public function __construct($data) {
        $this->data = $data;
        $this->next = NULL;
    }
}
 // lista circular vinculada
class CircularLinkedList {
         private $header; // nodo principal

    function __construct($data) {
        $this->header = new Node($data);
        $this->header->next = $this->header;
    }
         // Encontrar nodo
    public function find($item) {
        $current = $this->header;
        while ($current->data != $item) {
            $current = $current->next;
        }
        return $current;
    }
         // Insertar nuevo nodo
    public function insert($item, $new) {
        $newNode = new Node($new);
        $current = $this->find($item);
        if ($current-> next != $this-> header) {  // centro de la lista
            $current->next = $newNode;
            $newNode->next = $current->next;
        } 
        else {// fin de la lista
            $current->next = $newNode;
            $newNode->next = $this->header;
        }
        return true;
    }
         // Eliminar nodo
    public function delete($item) {
        $current = $this->header;
        while ($current->next != null && $current->next->data != $item) {
            $current = $current->next;
        }
        if ($current-> next != $this-> header) {// centro de la lista
            $current->next = $current->next->next;
        } 
        else {// fin de la lista
            $current->next = $this->header;
        } 
     }
        // Mostrar los elementos en la lista vinculada
     public function display() {
        $current = $this->header;
        while ($current->next != $this->header) {
            echo $current->next->data . "&nbsp;&nbsp;&nbsp";
            $current = $current->next;
        }
    } 
}

 // prueba
$linkedList = new CircularLinkedList('header');
$linkedList->insert('header', 'China');
$linkedList->insert('China', 'USA');
$linkedList->insert('USA', 'England');
$linkedList->insert('England', 'Australia');
 echo'La lista vinculada es: ';
$linkedList->display();
echo "</br>";
 echo '----- Eliminar nodo USA -----';
echo "</br>";
$linkedList->delete('USA');
 echo'La lista vinculada es: ';
$linkedList->display();
 // salida:
/*  La lista vinculada es: China Estados Unidos Inglaterra Australia
 ----- eliminar nodo USA -----
 La lista vinculada es: China Inglaterra Australia 
 */