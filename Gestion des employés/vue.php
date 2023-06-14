<?php class Vue {
    protected $content;
    protected $title;

    public function __construct($title) {
        $this->title = $title;
        $this->content = "<html><head><title>$title</title></head><body>";
    }

    public function getContent() {
        return $this->content;
    }

    public function finirContent() {
        $this->content .= "</body></html>";
    }

    public function afficher() {
        $this->finirContent();
        echo $this->getContent();
    }

    
  
}
?>
