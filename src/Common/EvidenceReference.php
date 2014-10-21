<?php
/**
 *
 * 
 *
 * Generated by <a href="http://enunciate.codehaus.org">Enunciate</a>.
 *
 */

namespace Gedcomx\Common;

/**
 * A reference to a resource that is being used as evidence.
 */
class EvidenceReference extends \Gedcomx\Links\HypermediaEnabledData
{
    const JSON_IDENTIFIER = 'evidence';
    /**
     * The resource id of the resource being referenced.
     *
     * @var string
     */
    private $resourceId;

    /**
     * The URI to the resource.
     *
     * @var string
     */
    private $resource;

    /**
     * Attribution metadata for evidence reference.
     *
     * @var \Gedcomx\Common\Attribution
     */
    private $attribution;

    /**
     * Constructs a EvidenceReference from a (parsed) JSON hash
     *
     * @param mixed $o Either an array (JSON) or an XMLReader.
     */
    public function __construct($o = null)
    {
        if (is_array($o)) {
            $this->initFromArray($o);
        }
        else if ($o instanceof \XMLReader) {
            $success = true;
            while ($success && $o->nodeType != \XMLReader::ELEMENT) {
                $success = $o->read();
            }
            if ($o->nodeType != \XMLReader::ELEMENT) {
                throw new \Exception("Unable to read XML: no start element found.");
            }

            $this->initFromReader($o);
        }
    }

    /**
     * The resource id of the resource being referenced.
     *
     * @return string
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }

    /**
     * The resource id of the resource being referenced.
     *
     * @param string $resourceId
     */
    public function setResourceId($resourceId)
    {
        $this->resourceId = $resourceId;
    }
    /**
     * The URI to the resource.
     *
     * @return string
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * The URI to the resource.
     *
     * @param string $resource
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
    }
    /**
     * Attribution metadata for evidence reference.
     *
     * @return \Gedcomx\Common\Attribution
     */
    public function getAttribution()
    {
        return $this->attribution;
    }

    /**
     * Attribution metadata for evidence reference.
     *
     * @param \Gedcomx\Common\Attribution $attribution
     */
    public function setAttribution($attribution)
    {
        $this->attribution = $attribution;
    }
    /**
     * Returns the associative array for this EvidenceReference
     *
     * @return array
     */
    public function toArray()
    {
        $a = parent::toArray();
        if ($this->resourceId) {
            $a["resourceId"] = $this->resourceId;
        }
        if ($this->resource) {
            $a["resource"] = $this->resource;
        }
        if ($this->attribution) {
            $a["attribution"] = $this->attribution->toArray();
        }
        return $a;
    }


    /**
     * Initializes this EvidenceReference from an associative array
     *
     * @param array $o
     */
    public function initFromArray($o)
    {
        parent::initFromArray($o);
        if (isset($o['resourceId'])) {
            $this->resourceId = $o["resourceId"];
        }
        if (isset($o['resource'])) {
            $this->resource = $o["resource"];
        }
        if (isset($o['attribution'])) {
            $this->attribution = new \Gedcomx\Common\Attribution($o["attribution"]);
        }
    }

    /**
     * Sets a known child element of EvidenceReference from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether a child element was set.
     */
    protected function setKnownChildElement($xml) {
        $happened = parent::setKnownChildElement($xml);
        if ($happened) {
          return true;
        }
        else if (($xml->localName == 'attribution') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
            $child = new \Gedcomx\Common\Attribution($xml);
            $this->attribution = $child;
            $happened = true;
        }
        return $happened;
    }

    /**
     * Sets a known attribute of EvidenceReference from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether an attribute was set.
     */
    protected function setKnownAttribute($xml) {
        if (parent::setKnownAttribute($xml)) {
            return true;
        }
        else if (($xml->localName == 'resourceId') && (empty($xml->namespaceURI))) {
            $this->resourceId = $xml->value;
            return true;
        }
        else if (($xml->localName == 'resource') && (empty($xml->namespaceURI))) {
            $this->resource = $xml->value;
            return true;
        }

        return false;
    }

    /**
     * Writes this EvidenceReference to an XML writer.
     *
     * @param \XMLWriter $writer The XML writer.
     * @param bool $includeNamespaces Whether to write out the namespaces in the element.
     */
    public function toXml($writer, $includeNamespaces = true)
    {
        $writer->startElementNS('gx', 'evidenceReference', null);
        if ($includeNamespaces) {
            $writer->writeAttributeNs('xmlns', 'gx', null, 'http://gedcomx.org/v1/');
        }
        $this->writeXmlContents($writer);
        $writer->endElement();
    }

    /**
     * Writes the contents of this EvidenceReference to an XML writer. The startElement is expected to be already provided.
     *
     * @param \XMLWriter $writer The XML writer.
     */
    public function writeXmlContents($writer)
    {
        if ($this->resourceId) {
            $writer->writeAttribute('resourceId', $this->resourceId);
        }
        if ($this->resource) {
            $writer->writeAttribute('resource', $this->resource);
        }
        parent::writeXmlContents($writer);
        if ($this->attribution) {
            $writer->startElementNs('gx', 'attribution', null);
            $this->attribution->writeXmlContents($writer);
            $writer->endElement();
        }
    }
}
