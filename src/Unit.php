<?php

class Unit
{
    const ALLOWED_DIRECTION = [
        'right',
        'left',
        'top',
        'down'
    ];

    protected int $speed = 1;
    protected string $categName = 'Unit';
    protected int $life;
    private array $positions;

    public function __construct()
    {
        $this->positions = [
            'x' => 0,
            'y' => 0
        ];
    }
    
    /**
     * Get the value of speed
     *
     * @return  int
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Get the value of life
     *
     * @return  int
     */
    public function getLife()
    {
        return $this->life;
    }

    public function getPositionX()
    {
        return $this->positions['x'];
    }

    public function getPositionY()
    {
        return $this->positions['y'];
    }

    public function setPositionX(int $x) : Unit
    {
        $this->positions['x'] = $x;

        return $this;
    }

    public function setPositionY(int $y) : Unit
    {
        $this->positions['y'] = $y;

        return $this;
    }

    public function walk(string $direction) :Unit
    {
        if (in_array($direction, self::ALLOWED_DIRECTION)) {
            $this->setPositions($direction);
        }
        return $this;
    }

    public function resetPosition()
    {
        $this->positions['y'] = 0;
        $this->positions['x'] = 0;
    }


    protected function setPositions(string $direction)
    {
        switch ($direction) {
            case 'top':
                $this->positions['y'] = $this->positions['y'] - $this->speed;
                break;
            case 'down':
                $this->positions['y'] = $this->positions['y'] + $this->speed;
                break;
            case 'right':
                $this->positions['x'] = $this->positions['x'] + $this->speed;
                break;
            case 'left':
                $this->positions['x'] = $this->positions['x'] - $this->speed;
                break;
        }
    }

    public function __toString()
    {
        $x = strval($this->positions['x']);
        $y = strval($this->positions['y']);
        return "[$x,$y]";
    }

    /**
     * Get the value of name
     *
     * @return  string
     */
    public function getCategName() :string
    {
        return $this->categName;
    }
}
