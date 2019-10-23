<?php


namespace VastLands\VAPI\VProfile;


use VastLands\VAPI\VAPI;

class VProfile
{

    public $username;
    public $fetchedData = [];

    public $valid = false;

    const ENDPOINT = "profile/";

    public function __construct(string $username)
    {
        $this->username = $username;
        $this->fetch();
    }

    /**
     * @return string
     */
    public function getUsername() : string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return array
     */
    public function getFetchedData(): array
    {
        return $this->fetchedData;
    }

    /**
     * @param array $fetchedData
     */
    public function setFetchedData(array $fetchedData): void
    {
        $this->fetchedData = $fetchedData;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->valid;
    }

    /**
     * @param bool $valid
     */
    public function setValid(bool $valid): void
    {
        $this->valid = $valid;
    }


    /*
     * Fetches the player data again from the
     */
    public function fetch(){
        $data = json_decode(file_get_contents(VAPI::API_ENDPOINT . self::ENDPOINT . $this->getUsername()), true);
        $this->valid = $data['Status'];
        $this->setFetchedData($data);
    }

    /*
     * Returns the player current rank
     */
    public function getRank() : string {
        return $this->getFetchedData()['Profile']['Rank'];
    }

    /*
     * Returns the player coins, (LOBBIES only!)
     */
    public function getCoins() : int {
        return $this->getFetchedData()['Profile']['Rank'];
    }

    /*
     * Returns the player XUUID
     */
    public function getUUID() : string {
        return $this->getFetchedData()['Profile']['UUID'];
    }

    /*
     * Returns the date of which the player first joined VastLands
     */
    public function getFirstJoinedDate() : string {
        return $this->getFetchedData()['Profile']['First Joined Date'];
    }

    /*
     * Returns the last time the player was logged on
     */
    public function getLastLoggedInDate() : string {
        return $this->getFetchedData()['Profile']['Last Logged In Date'];
    }

    /*
     * Returns the player forum username
     * Also, it'll return empty string if it's not linked
     */
    public function getForumUsername() : string {
        return $this->getFetchedData()['Profile']['Linked accounts']['Forum'];
    }

    /*
     * Returns the player discord ID
     * Also, it'll return an empty string if it's not linked
     */
    public function getDiscordID() : string {
        return $this->getFetchedData()['Profile']['Linked accounts']['Discord'];
    }

    /*
     * Returns weather the player has finished
     * the lobby tutorial or not
     */
    public function hasFinishedTutorial() : bool {
        return $this->getFetchedData()['Profile']['Settings']['Finished Tutorial'];
    }

    /*
     * Returns the player preferred set language
     */
    public function getLanguage() : string {
        return isset($this->getFetchedData()['Profile']['Settings']['Language']) ?
            $this->getFetchedData()['Profile']['Settings']['Language'] : "English";
    }

    /*
     * Returns the total available
     * Throwable TNTs the player has
     */
    public function getThrowableTNTs() : int {
        return $this->getFetchedData()['Profile']['Gadgets']['THROWABLE TNT'];
    }

    /*
     * Returns a list of their friends
     */
    public function getFriends() : array {
        return $this->getFetchedData()['Profile']['Friends'];
    }

    /*
     * Returns a list of their current friend requests
     */
    public function getFriendRequests() : array {
        return $this->getFetchedData()['Profile']['Friend Requests'];
    }
}