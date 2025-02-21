<?php
// Create a abstrac class for controller components
abstract class  AbstractController {

    private ViewHeader $header;
    private ViewFooter $footer;
    private InterfaceModel $model;

    // constructor:
    public function __construct(InterfaceModel $model){
         $this->model = $model;
    }

    // Getter and Setter :
    public function getHeader():ViewHeader{
        return $this->header;
    }
    public function setHeader(?ViewHeader $NewHeader):self{
        $this->header = $NewHeader;
        return $this;
    }
    public function getFooter():ViewFooter{
        return $this->footer;
    }
    public function setFooter(?ViewFooter $NewFooter):self{
        $this->footer = $NewFooter;
        return $this;
    }
    public function getModel():InterfaceModel{
        return $this->model;
    }
    public function setModel(?InterfaceModel $NewInterfaceModel):self{
        $this->model = $NewInterfaceModel;
        return $this;
    }

    // Method: 
    public function render():void{
    }
}