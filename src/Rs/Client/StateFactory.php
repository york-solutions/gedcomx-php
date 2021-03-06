<?php


namespace Gedcomx\Rs\Client;

use Gedcomx\Gedcomx;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlHandler;

/**
 * The state factory is responsible for instantiating state classes from REST API responses.
 */
class StateFactory
{
    /**
     * The default production environment URI for the family tree.
     */
    const PRODUCTION_URI = "https://api.familysearch.org/platform/collections/tree";
    /**
     * The default integration environment URI for the family tree.
     */
    const INTEGRATION_URI = "https://api-integ.familysearch.org/platform/collections/tree";
    /**
     * The default production environment URI for the discovery endpoint.
     */
    const PRODUCTION_DISCOVERY_URI = "https://api.familysearch.org/platform/collection";
    /**
     * The default integration environment URI for the discovery endpoint.
     */
    const INTEGRATION_DISCOVERY_URI = "https://api-integ.familysearch.org/platform/collection";

    /**
     * @var boolean Are we in a production environment
     */
    protected $production;

    /**
     * Constructs a new instance of this state factory, using the environment specified (defaults to integration).
     *
     * @param bool $production
     */
    public function __construct($production = false)
    {
        $this->production = $production;
    }

    /**
     * Returns a new collection state by invoking the specified URI and method, using the specified client.
     *
     * @param string              $uri    Optional URI
     * @param \GuzzleHttp\Client $client The client to use.
     * @param string $method The method.
     *
     * @return CollectionState The collection state.
     */
    public function newCollectionState($uri = null, $method = "GET", Client $client = null)
    {
        if (!$client) {
            $client = $this->defaultClient();
        }
        if ($uri == null) {
            $uri = $this->production ? self::PRODUCTION_URI : self::INTEGRATION_URI;
        }
        
        /** @var Request $request */
        $request = new Request($method, $uri, ['Accept' => Gedcomx::JSON_MEDIA_TYPE]);
        return new CollectionState($client, $request, GedcomxApplicationState::send($client, $request), null, $this);
    }

    /**
     * Returns a new collections state by invoking the specified URI and method, using the specified client.
     *
     * @param string              $uri    Optional URI
     * @param \GuzzleHttp\Client $client The client to use.
     * @param string              $method The method.
     *
     * @return CollectionsState The collections state.
     */
    public function newCollectionsState($uri = null, $method = "GET", Client $client = null)
    {
        if (!$client) {
            $client = $this->defaultClient();
        }
        if ($uri == null) {
            $uri = $this->production ? self::PRODUCTION_DISCOVERY_URI : self::INTEGRATION_DISCOVERY_URI;
        }

        /** @var Request $request */
        $request = new Request($method, $uri, ['Accept' => Gedcomx::JSON_MEDIA_TYPE]);
        return new CollectionsState($client, $request, GedcomxApplicationState::send($client, $request), null, $this);
    }

    /**
     * Returns a new discovery state by invoking the specified URI and method, using the specified client.
     *
     * @param string              $uri    Optional URI
     * @param \GuzzleHttp\Client $client The client to use.
     * @param string              $method The method.
     *
     * @return CollectionState The collection state.
     */
    public function newDiscoveryState($uri = null, $method = "GET", Client $client = null)
    {
        if (!$client) {
            $client = $this->defaultClient();
        }
        if ($uri == null) {
            $uri = $this->production ? self::PRODUCTION_DISCOVERY_URI : self::INTEGRATION_DISCOVERY_URI;
        }

        /** @var Request $request */
        $request = new Request($method, $uri, ['Accept' => Gedcomx::JSON_MEDIA_TYPE]);
        return new CollectionState($client, $request, GedcomxApplicationState::send($client, $request), null, $this);
    }

    /**
     * Loads the default client for executing REST API requests.
     *
     * @return \GuzzleHttp\Client
     */
    protected function defaultClient()
    {
        return new Client([
            'handler' => HandlerStack::create(new CurlHandler()),
            'http_errors' => false
        ]);
    }

    /**
     * Returns a new person state by invoking the specified URI and method, using the specified client.
     *
     * @param string $uri The URI to the person.
     * @param \GuzzleHttp\Client $client The client to use.
     * @param string $method The method.
     *
     * @return PersonState The person state.
     */
    public function newPersonState($uri, Client $client = null, $method = "GET")
    {
        if (!$client) {
            $client = $this->defaultClient();
        }

        /** @var Request $request */
        $request = new Request($method, $uri, ['Accept' => Gedcomx::JSON_MEDIA_TYPE]);
        return new PersonState($client, $request, GedcomxApplicationState::send($client, $request), null, $this);
    }

    /**
     * Dynamically creates and returns a state instance for the specified class, if a state builder is defined.
     *
     * @param string $class The name of the state class to create
     * @param \GuzzleHttp\Client $client
     * @param \GuzzleHttp\Psr7\Request $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string $accessToken The access token for this session
     *
     * @return mixed
     */
    public function createState($class, Client $client, Request $request, Response $response, $accessToken)
    {
        $functionName = "build{$class}";
        return $this->$functionName($client, $request, $response, $accessToken);
    }

    /**
     * Builds a new collection state from the specified client, request, response, and access token.
     *
     * @param \GuzzleHttp\Client $client
     * @param \GuzzleHttp\Psr7\Request $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string $accessToken The access token for this session
     *
     * @return \Gedcomx\Rs\Client\SourceDescriptionsState
     */
    protected function buildCollectionState(Client $client, Request $request, Response $response, $accessToken)
    {
        return new CollectionState($client, $request, $response, $accessToken, $this);
    }

    /**
     * Builds a new collections state from the specified client, request, response, and access token.
     *
     * @param \GuzzleHttp\Client $client
     * @param \GuzzleHttp\Psr7\Request $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string $accessToken The access token for this session
     *
     * @return \Gedcomx\Rs\Client\SourceDescriptionsState
     */
    protected function buildCollectionsState( Client $client, Request $request, Response $response, $accessToken ){
        return new CollectionsState( $client, $request, $response, $accessToken, $this );
    }

    /**
     * Builds a new source descriptions state from the specified client, request, response, and access token.
     *
     * @param \GuzzleHttp\Client           $client
     * @param \GuzzleHttp\Psr7\Request  $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string                        $accessToken The access token for this session
     *
     * @return \Gedcomx\Rs\Client\SourceDescriptionsState
     */
    protected function buildSourceDescriptionsState(Client $client, Request $request, Response $response, $accessToken)
    {
        return new SourceDescriptionsState($client, $request, $response, $accessToken, $this);
    }

    /**
     * Builds a new source description state from the specified client, request, response, and access token.
     *
     * @param \GuzzleHttp\Client $client
     * @param \GuzzleHttp\Psr7\Request $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string $accessToken The access token for this session
     *
     * @return \Gedcomx\Rs\Client\SourceDescriptionsState
     */
    protected function buildSourceDescriptionState(Client $client, Request $request, Response $response, $accessToken)
    {
        return new SourceDescriptionState($client, $request, $response, $accessToken, $this);
    }

    /**
     * Builds a new persons state from the specified client, request, response, and access token.
     *
     * @param \GuzzleHttp\Client $client
     * @param \GuzzleHttp\Psr7\Request $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string $accessToken The access token for this session
     *
     * @return \Gedcomx\Rs\Client\PersonsState
     */
    protected function buildPersonsState(Client $client, Request $request, Response $response, $accessToken)
    {
        return new PersonsState($client, $request, $response, $accessToken, $this);
    }

    /**
     * Builds a new person children state from the specified client, request, response, and access token.
     *
     * @param \GuzzleHttp\Client $client
     * @param \GuzzleHttp\Psr7\Request $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string $accessToken The access token for this session
     *
     * @return \Gedcomx\Rs\Client\PersonChildrenState
     */
    protected function buildPersonChildrenState(Client $client, Request $request, Response $response, $accessToken)
    {
        return new PersonChildrenState($client, $request, $response, $accessToken, $this);
    }

    /**
     * Builds a new person state from the specified client, request, response, and access token.
     *
     * @param \GuzzleHttp\Client $client
     * @param \GuzzleHttp\Psr7\Request $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string $accessToken The access token for this session
     *
     * @return \Gedcomx\Rs\Client\PersonState
     */
    protected function buildPersonState(Client $client, Request $request, Response $response, $accessToken)
    {
        return new PersonState($client, $request, $response, $accessToken, $this);
    }

    /**
     * Builds a new person parents state from the specified client, request, response, and access token.
     *
     * @param \GuzzleHttp\Client $client
     * @param \GuzzleHttp\Psr7\Request $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string $accessToken The access token for this session
     *
     * @return \Gedcomx\Rs\Client\PersonParentsState
     */
    protected function buildPersonParentsState(Client $client, Request $request, Response $response, $accessToken)
    {
        return new PersonParentsState($client, $request, $response, $accessToken, $this);
    }

    /**
     * Builds a new person spouses state from the specified client, request, response, and access token.
     *
     * @param \GuzzleHttp\Client $client
     * @param \GuzzleHttp\Psr7\Request $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string $accessToken The access token for this session
     *
     * @return \Gedcomx\Rs\Client\PersonSpousesState
     */
    protected function buildPersonSpousesState(Client $client, Request $request, Response $response, $accessToken)
    {
        return new PersonSpousesState($client, $request, $response, $accessToken, $this);
    }

    /**
     * Builds a new ancestry results state from the specified client, request, response, and access token.
     *
     * @param \GuzzleHttp\Client $client
     * @param \GuzzleHttp\Psr7\Request $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string $accessToken The access token for this session
     *
     * @return \Gedcomx\Rs\Client\AncestryResultsState
     */
    protected function buildAncestryResultsState(Client $client, Request $request, Response $response, $accessToken)
    {
        return new AncestryResultsState($client, $request, $response, $accessToken, $this);
    }

    /**
     * Builds a new descendancy results state from the specified client, request, response, and access token.
     *
     * @param \GuzzleHttp\Client $client
     * @param \GuzzleHttp\Psr7\Request $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string $accessToken The access token for this session
     *
     * @return \Gedcomx\Rs\Client\AncestryResultsState
     */
    protected function buildDescendancyResultsState(Client $client, Request $request, Response $response, $accessToken)
    {
        return new DescendancyResultsState($client, $request, $response, $accessToken, $this);
    }

    /**
     * Builds a new person search results state from the specified client, request, response, and access token.
     *
     * @param \GuzzleHttp\Client $client
     * @param \GuzzleHttp\Psr7\Request $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string $accessToken The access token for this session
     *
     * @return \Gedcomx\Rs\Client\PersonSearchResultsState
     */
    protected function buildPersonSearchResultsState(Client $client, Request $request, Response $response, $accessToken)
    {
        return new PersonSearchResultsState($client, $request, $response, $accessToken, $this);
    }

    /**
     * Builds a new record state from the specified client, request, response, and access token.
     *
     * @param \GuzzleHttp\Client $client
     * @param \GuzzleHttp\Psr7\Request $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string $accessToken The access token for this session
     *
     * @return \Gedcomx\Rs\Client\RecordState
     */
    protected function buildRecordState(Client $client, Request $request, Response $response, $accessToken)
    {
        return new RecordState($client, $request, $response, $accessToken, $this);
    }

    /**
     * Builds a new relationship state from the specified client, request, response, and access token.
     *
     * @param \GuzzleHttp\Client $client
     * @param \GuzzleHttp\Psr7\Request $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string $accessToken The access token for this session
     *
     * @return \Gedcomx\Rs\Client\RecordState
     */
    protected function buildRelationshipState(Client $client, Request $request, Response $response, $accessToken)
    {
        return new RelationshipState($client, $request, $response, $accessToken, $this);
    }

    /**
     * Builds a new agent state from the specified client, request, response, and access token.
     *
     * @param \GuzzleHttp\Client $client
     * @param \GuzzleHttp\Psr7\Request $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string $accessToken The access token for this session
     *
     * @return \Gedcomx\Rs\Client\RecordState
     */
    protected function buildAgentState(Client $client, Request $request, Response $response, $accessToken)
    {
        return new AgentState($client, $request, $response, $accessToken, $this);
    }

    /**
     * Builds a new place search state from the specified client, request, response, and access token.
     *
     * @param \GuzzleHttp\Client $client
     * @param \GuzzleHttp\Psr7\Request $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string $accessToken The access token for this session
     *
     * @return \Gedcomx\Rs\Client\RecordState
     */
    protected function buildPlaceSearchResultState(Client $client, Request $request, Response $response, $accessToken)
    {
        return new PlaceSearchResultState($client, $request, $response, $accessToken, $this);
    }

    /**
     * Builds a new place description state from the specified client, request, response, and access token.
     *
     * @param \GuzzleHttp\Client $client
     * @param \GuzzleHttp\Psr7\Request $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string $accessToken The access token for this session
     *
     * @return \Gedcomx\Rs\Client\PlaceDescriptionState
     */
    protected function buildPlaceDescriptionState(Client $client, Request $request, Response $response, $accessToken)
    {
        return new PlaceDescriptionState($client, $request, $response, $accessToken, $this);
    }

    /**
     * Builds a new vocab element list state from the specified client, request, response, and access token.
     *
     * @param \GuzzleHttp\Client $client
     * @param \GuzzleHttp\Psr7\Request $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string $accessToken The access token for this session
     *
     * @return \Gedcomx\Rs\Client\PlaceDescriptionState
     */
    protected function buildVocabElementListState(Client $client, Request $request, Response $response, $accessToken)
    {
        return new VocabElementListState($client, $request, $response, $accessToken, $this);
    }

    /**
     * Builds a new vocab element state from the specified client, request, response, and access token.
     *
     * @param \GuzzleHttp\Client $client
     * @param \GuzzleHttp\Psr7\Request $request
     * @param \GuzzleHttp\Psr7\Response $response
     * @param string $accessToken The access token for this session
     *
     * @return \Gedcomx\Rs\Client\PlaceDescriptionState
     */
    protected function buildVocabElementState(Client $client, Request $request, Response $response, $accessToken)
    {
        return new VocabElementState($client, $request, $response, $accessToken, $this);
    }
}
