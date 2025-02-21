<?php
// Create an interface model with two functions

interface InterfaceModel{
    public function add():string;
    public function getAll(): array | null;
}