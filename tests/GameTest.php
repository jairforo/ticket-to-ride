<?php
use PHPUnit\Framework\TestCase;

/**
 * @covers Game
 */
class GameTest extends TestCase
{
    /** @var  Game */
    private $game;
    /** @var  RouteFactory */
    private $routeFactory;

    /** @var  City */
    private $lisbon;

    /** @var  City */
    private $cascais;

    public function setUp()
    {
        $this->lisbon = new City('Lisbon');
        $this->cascais = new City('Cascais');
        $this->game = new Game();
        $this->routeFactory = new RouteFactory();
    }

    public function testAPlayerCanClaimAColoredRouteIfItHaveTheSameAmountOfCardsOfTheSameColor()
    {
        $route = $this->routeFactory->create(Color::BLUE(), 3, $this->lisbon, $this->cascais);
        $playerCards = [
            new SimpleTrainCarCard(Color::BLUE()),
            new SimpleTrainCarCard(Color::BLUE()),
            new SimpleTrainCarCard(Color::BLUE())
        ];
        $this->assertTrue($this->game->canClaim($route, $playerCards));
    }

    public function testAPlayerCanClaimAColoredRouteIfItHaveMoreThanTheAmountOfCardsOfTheSameColor()
    {
        $route = $this->routeFactory->create(
            Color::BLUE(),
            3,
            $this->lisbon,
            $this->cascais);
        $playerCards = [
            new SimpleTrainCarCard(Color::BLUE()),
            new SimpleTrainCarCard(Color::BLUE()),
            new SimpleTrainCarCard(Color::BLUE()),
            new SimpleTrainCarCard(Color::BLUE())
        ];
        $this->assertTrue($this->game->canClaim($route, $playerCards));

    }

    public function testAPlayerCanNotClaimAColoredRouteIfItHaveLessThanTheAmountOfCardsOfTheSameColor()
    {
        $route = $this->routeFactory->create(
            Color::BLUE(),
            3,
            $this->lisbon,
            $this->cascais);
        $playerCards = [
            new SimpleTrainCarCard(Color::BLUE()),
            new SimpleTrainCarCard(Color::BLUE()),
            new SimpleTrainCarCard(Color::YELLOW())

        ];
        $this->assertFalse($this->game->canClaim($route, $playerCards));
    }

    public function testAPlayerCanClaimAColoredRouteIfItHaveLocomotivesToCompleteTheAmountOfCards()
    {
        $route = $this->routeFactory->create(
            Color::BLUE(),
            3,
            $this->lisbon,
            $this->cascais);
        $playerCards = [
            new SimpleTrainCarCard(Color::BLUE()),
            new SimpleTrainCarCard(Color::BLUE()),
            new Locomotive()

        ];
        $this->assertTrue($this->game->canClaim($route, $playerCards));
    }

    public function testAPlayerCanClaimARouteIfItHaveEnoughLocomotives()
    {
        $route = $this->routeFactory->create(
            Color::BLUE(),
            3,
            $this->lisbon,
            $this->cascais);
        $playerCards = [
            new Locomotive(),
            new Locomotive(),
            new Locomotive()
        ];
        $this->assertTrue($this->game->canClaim($route, $playerCards));
    }

    public function testAPlayerCanClaimAGrayRouteIfItHaveTheSameAmountOfCardsOfAColor()
    {
        $route = $this->routeFactory->create(
            Color::GRAY(),
            2,
            $this->lisbon,
            $this->cascais);
        $playerCards = [
            new SimpleTrainCarCard(Color::RED()),
            new SimpleTrainCarCard(Color::GREEN()),
            new SimpleTrainCarCard(Color::BLUE()),
            new SimpleTrainCarCard(Color::GREEN()),

        ];
        $this->assertTrue($this->game->canClaim($route, $playerCards));
    }

    public function testAPlayerCanClaimAGrayRouteIfItHaveMoreThanTheSameAmountOfCardsOfAColor()
    {
        $route = $this->routeFactory->create(
            Color::GRAY(),
            3,
            $this->lisbon,
            $this->cascais);
        $playerCards = [
            new SimpleTrainCarCard(Color::RED()),
            new SimpleTrainCarCard(Color::GREEN()),
            new SimpleTrainCarCard(Color::BLUE()),
            new SimpleTrainCarCard(Color::GREEN()),
            new SimpleTrainCarCard(Color::GREEN()),
            new SimpleTrainCarCard(Color::GREEN())
        ];
        $this->assertTrue($this->game->canClaim($route, $playerCards));
    }


    public function testAPlayerCanNotClaimAGrayRouteIfItHaveLessThanTheSameAmountOfCardsOfAColor()
    {
        $route = $this->routeFactory->create(
            Color::GRAY(),
            3,
            $this->lisbon,
            $this->cascais);
        $playerCards = [
            new SimpleTrainCarCard(Color::RED()),
            new SimpleTrainCarCard(Color::GREEN()),
            new SimpleTrainCarCard(Color::BLUE()),
            new SimpleTrainCarCard(Color::BLUE()),
        ];
        $this->assertFalse($this->game->canClaim($route, $playerCards));
    }

    public function testAPlayerCanClaimAGrayRouteIfItHaveLocomotivesToCompleteTheAmountOfCards()
    {
        $route = $this->routeFactory->create(
            Color::GRAY(),
            3,
            $this->lisbon,
            $this->cascais);
        $playerCards = [
            new SimpleTrainCarCard(Color::RED()),
            new Locomotive(),
            new SimpleTrainCarCard(Color::GREEN()),
            new SimpleTrainCarCard(Color::BLUE()),
            new SimpleTrainCarCard(Color::BLUE()),
        ];
        $this->assertTrue($this->game->canClaim($route, $playerCards));
    }

    public function testAPlayerCanClaimAGrayRouteIfItHaveEnoughLocomotives()
    {
        $route = $this->routeFactory->create(
            Color::GRAY(),
            3,
            $this->lisbon,
            $this->cascais);
        $playerCards = [
            new Locomotive(),
            new Locomotive(),
            new Locomotive()
        ];
        $this->assertTrue($this->game->canClaim($route, $playerCards));
    }

}