<?php


namespace Gedcomx\Rs\Client;

use Gedcomx\Agent\Agent;
use Gedcomx\Gedcomx;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

/**
 * The AgentState exposes management functions for an agent.
 *
 * Class AgentState
 *
 * @package Gedcomx\Rs\Client
 */
class AgentState extends GedcomxApplicationState
{
    /**
     *Initializes a new instance of the AgentState class.
     *
     * @param \GuzzleHttp\Client             $client
     * @param \GuzzleHttp\Psr7\Request    $request
     * @param \GuzzleHttp\Psr7\Response   $response
     * @param string                          $accessToken
     * @param \Gedcomx\Rs\Client\StateFactory $stateFactory
     */
    function __construct(Client $client, Request $request, Response $response, $accessToken, StateFactory $stateFactory)
    {
        parent::__construct($client, $request, $response, $accessToken, $stateFactory);
    }

    /**
     * Clones the current state instance.
     *
     * @param \GuzzleHttp\Psr7\Request  $request
     * @param \GuzzleHttp\Psr7\Response $response
     *
     * @return \Gedcomx\Rs\Client\AgentState
     */
    protected function reconstruct(Request $request, Response $response)
    {
        return new AgentState($this->client, $request, $response, $this->accessToken, $this->stateFactory);
    }

    /**
     * Returns the entity from the REST API response.
     *
     * @return \Gedcomx\Gedcomx
     */
    protected function loadEntity()
    {
        $json = json_decode($this->response->getBody(), true);
        return new Gedcomx($json);
    }

    /**
     * Gets the main data element represented by this state instance.
     *
     * @return Agent
     */
    protected function getScope()
    {
        return $this->getAgent();
    }

    /**
     * Gets the rel name for the current state instance.
     *
     * @return string
     */
    public function getSelfRel()
    {
        return Rel::AGENT;
    }

    /**
     * Gets the agent represented by this state instance.
     *
     * @return Agent
     */
    public function getAgent()
    {
        if ($this->entity) {
            $agents = $this->entity->getAgents();
            if (count($agents) > 0) {
                return $agents[0];
            }
        }

        return null;
    }
}