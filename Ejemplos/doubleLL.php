
<?php
 // clase de nodo
class Node {
         public $data; // datos de nodo
         public $previous = NULL; // predecesor
         public $next = NULL; // sucesor

    public function __construct($data) {
        $this->data = $data;
        $this->previous = NULL;
        $this->next = NULL;
    }
}
 // Lista doblemente vinculada
class DoubleLinkedList {
         private $header; // nodo principal

    function __construct($data) {
        $this->header = new Node($data);
    }
         // Encontrar nodo
    public function find($item) {
        $current = $this->header;
        while ($current->data != $item) {
            $current = $current->next;
        }
        return $current;
    }
         // Encuentra el último nodo de la lista vinculada
    public function findLast() {
        $current = $this->header;
        while ($current->next != null) {
            $current = $current->next;
        }
        return $current;
    }
         // (Después del nodo) Insertar un nuevo nodo
    public function insert($item, $new) {
        $newNode = new Node($new);
        $current = $this->find($item);
        $newNode->next = $current->next;
        $newNode->previous = $current;
        $current->next = $newNode;
        return true;
    }
         // Eliminar un nodo de la lista vinculada
    public function delete($item) {
        $current = $this->find($item);
        if ($current->next != null) {
            $current->previous->next = $current->next;
            $current->next->previous = $current->previous;
            $current->next = null;
            $current->previous = null;
            return true;
        }
    }
         // Mostrar los elementos en la lista vinculada
    public function display() {
        $current = $this->header;
        if ($current->next == null) {
                         echo "¡La lista vinculada está vacía!";
            return;
        }
        while ($current->next != null) {
            echo $current->next->data . "&nbsp;&nbsp;&nbsp";
            $current = $current->next;
        }
    }
         // Muestra los elementos en la lista doblemente vinculada en orden inverso
    public function dispReverse() {
        $current = $this->findLast();
        while ($current->previous != null) {
            echo $current->data . "&nbsp;&nbsp;&nbsp";
            $current = $current->previous;
        }
    }
}

 // prueba
$linkedList = new DoubleLinkedList('header');
$linkedList->insert('header', 'China');
$linkedList->insert('China', 'USA');
$linkedList->insert('USA','England');
$linkedList->insert('England','Australia');
 echo'La lista vinculada es: ';
$linkedList->display();
echo "</br>";
 echo '----- Eliminar nodo USA -----';
echo "</br>";
$linkedList->delete('USA');
 echo'La lista vinculada es: ';
$linkedList->display();

 // salida:
 /* La lista vinculada es: China Estados Unidos Inglaterra Australia
 ----- eliminar nodo USA -----
 La lista vinculada es: China Inglaterra Australia  */ 