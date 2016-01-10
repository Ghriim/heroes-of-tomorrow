<?php

namespace CuteNinja\HOT\CharacterBundle\Tests\Context;

use CuteNinja\ParabolaBundle\Tests\Feature\Context\BaseContext;

/**
 * Class CharacterContext
 *
 * @package CuteNinja\HOT\CharacterBundle\Tests\Context
 */
class CharacterContext extends BaseContext
{
    const CHARACTER_ID_NOT_EXISTING = 1337;
    const API_NAME                  = 'characters';

    /**
     * @When I want to list all Characters
     */
    public function iWantToListAllCharacters()
    {
        $this->iWantToList(self::API_NAME);
    }

    /**
     * @When I want to see the details of the Character named :name
     *
     * @param string $name
     */
    public function iWantToSeeTheDetailsOfTheCharacterNamed($name)
    {
        $this->iWantToSeeTheDetails(self::API_NAME, $this->getCharacterIdForTest($name));
    }

    /**
     * @When I want to add a new Character
     */
    public function iWantToCreateAnCharacter()
    {
        $this->iWantToCreate(self::API_NAME);
    }

    /**
     * @When I want to edit the Character named :name
     *
     * @param string $name
     */
    public function iWantToEditTheCharacterNamed($name)
    {
        $this->iWantToEdit(self::API_NAME, $this->getCharacterIdForTest($name));
    }

    /**
     * @When I want to delete the Character named :name
     *
     * @param string $name
     */
    public function iWantToDeleteTheCharacterNamed($name)
    {
        $this->iWantToDelete(self::API_NAME, $this->getCharacterIdForTest($name));
    }

    /**
     * @When I want to see the Inventory of the Character named :name
     *
     * @param string $name
     */
    public function iWantToSeeTheInventoryOfTheCharacterNamed($name)
    {
        $this->requestApi('GET', '/api/' . self::API_NAME . '/' . $this->getCharacterIdForTest($name) . '/inventory');
    }

    /**
     * @Then the response body should contain the details of the Character
     */
    public function theResponseBodyShouldContainTheDetailsOfTheCharacter()
    {
    }

    /**
     * @Then the response body should contain the Inventory of the Character
     */
    public function theResponseBodyShouldContainTheInventoryOfTheCharacter()
    {
    }

    /**
     * @param $name
     *
     * @return int
     */
    private function getCharacterIdForTest($name)
    {
        $character = $this->getRepository('CuteNinjaHOTCharacterBundle:Character')->findOneBy(array('name' => $name));

        return $character ? $character->getId() : self::CHARACTER_ID_NOT_EXISTING;
    }
}