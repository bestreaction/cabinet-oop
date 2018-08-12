<?php

class ShelfManager {
    
    private $shelves = [];
    
    private $currentShelfIndex = 0;
    
    private $freeSpace = 60;
    
    public function __construct() {
        $this->shelves = [
            new Shelf(),
            new Shelf(),
            new Shelf(),
        ];
    }
    
    public function put(Item $box) {
        if ($this->currentShelfIndex > 2) {
            throw new ShelvesFullException();
        }
        
        try {
            $this->shelves[$this->currentShelfIndex][] = $box;
            return true;
        } catch (ShelfIsFullException $exception) {
            $this->currentShelfIndex++;
            $this->put($box);
        }
    }
    
    public function getFreeSpace() {
        foreach($this->shelves as $shelf) {
            $this->freeSpace -= $shelf->count();
        }
        
        return $this->freeSpace;
    }
}