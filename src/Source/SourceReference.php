<?php
/**
 *
 * 
 *
 * Generated by <a href="http://enunciate.codehaus.org">Enunciate</a>.
 *
 */

namespace Gedcomx\Source;

use Gedcomx\Common\Attributable;
use Gedcomx\Common\Attribution;
use Gedcomx\Common\Qualifier;
use Gedcomx\Links\HypermediaEnabledData;

/**
 * An attributable reference to a description of a source.
 */
class SourceReference extends HypermediaEnabledData implements Attributable
{
    const JSON_IDENTIFIER = 'sourceReferences';
    /**
     * A reference to a description of the source being referenced.
     *
     * @var string
     */
    private $descriptionRef;

    /**
     * The attribution metadata for this source reference.
     *
     * @var \Gedcomx\Common\Attribution
     */
    private $attribution;

    /**
     * The qualifiers associated with this source reference.
     *
     * @var Qualifier[]
     */
    private $qualifiers;

    /**
     * Constructs a SourceReference from a (parsed) JSON hash
     *
     * @param mixed $o Either an array (JSON) or an XMLReader.
     *
     * @throws \Exception
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
     * A reference to a description of the source being referenced.
     *
     * @return string
     */
    public function getDescriptionRef()
    {
        return $this->descriptionRef;
    }

    /**
     * A reference to a description of the source being referenced.
     *
     * @param string $descriptionRef
     */
    public function setDescriptionRef($descriptionRef)
    {
        $this->descriptionRef = $descriptionRef;
    }
    /**
     * The attribution metadata for this source reference.
     *
     * @return \Gedcomx\Common\Attribution
     */
    public function getAttribution()
    {
        return $this->attribution;
    }

    /**
     * The attribution metadata for this source reference.
     *
     * @param \Gedcomx\Common\Attribution $attribution
     */
    public function setAttribution(Attribution $attribution)
    {
        $this->attribution = $attribution;
    }
    /**
     * The qualifiers associated with this source reference.
     *
     * @return Qualifier[]
     */
    public function getQualifiers()
    {
        return $this->qualifiers;
    }

    /**
     * The qualifiers associated with this source reference.
     *
     * @param Qualifier[] $qualifiers
     */
    public function setQualifiers($qualifiers)
    {
        $this->qualifiers = $qualifiers;
    }
    /**
     * Returns the associative array for this SourceReference
     *
     * @return array
     */
    public function toArray()
    {
        $a = parent::toArray();
        if ($this->descriptionRef) {
            $a["description"] = $this->descriptionRef;
        }
        if ($this->attribution) {
            $a["attribution"] = $this->attribution->toArray();
        }
        if ($this->qualifiers) {
            $ab = array();
            foreach ($this->qualifiers as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['qualifiers'] = $ab;
        }
        return $a;
    }


    /**
     * Initializes this SourceReference from an associative array
     *
     * @param array $o
     */
    public function initFromArray($o)
    {
        parent::initFromArray($o);
        if (isset($o['description'])) {
            $this->descriptionRef = $o["description"];
        }
        if (isset($o['attribution'])) {
            $this->attribution = $o['attribution'] instanceof Attribution ? $o['attribution'] :  new Attribution($o["attribution"]);
        }
        $this->qualifiers = array();
        if (isset($o['qualifiers'])) {
            foreach ($o['qualifiers'] as $i => $x) {
                $this->qualifiers[$i] = $x instanceof Qualifier ? $x : new Qualifier($x);
            }
        }
    }

    /**
     * Sets a known child element of SourceReference from an XML reader.
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
            $child = new Attribution($xml);
            $this->attribution = $child;
            $happened = true;
        }
        else if (($xml->localName == 'qualifier') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
            $child = new Qualifier($xml);
            if (!isset($this->qualifiers)) {
                $this->qualifiers = array();
            }
            array_push($this->qualifiers, $child);
            $happened = true;
        }
        return $happened;
    }

    /**
     * Sets a known attribute of SourceReference from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether an attribute was set.
     */
    protected function setKnownAttribute($xml) {
        if (parent::setKnownAttribute($xml)) {
            return true;
        }
        else if (($xml->localName == 'description') && (empty($xml->namespaceURI))) {
            $this->descriptionRef = $xml->value;
            return true;
        }

        return false;
    }

    /**
     * Writes this SourceReference to an XML writer.
     *
     * @param \XMLWriter $writer The XML writer.
     * @param bool $includeNamespaces Whether to write out the namespaces in the element.
     */
    public function toXml($writer, $includeNamespaces = true)
    {
        $writer->startElementNS('gx', 'sourceReference', null);
        if ($includeNamespaces) {
            $writer->writeAttributeNs('xmlns', 'gx', null, 'http://gedcomx.org/v1/');
        }
        $this->writeXmlContents($writer);
        $writer->endElement();
    }

    /**
     * Writes the contents of this SourceReference to an XML writer. The startElement is expected to be already provided.
     *
     * @param \XMLWriter $writer The XML writer.
     */
    public function writeXmlContents($writer)
    {
        if ($this->descriptionRef) {
            $writer->writeAttribute('description', $this->descriptionRef);
        }
        parent::writeXmlContents($writer);
        if ($this->attribution) {
            $writer->startElementNs('gx', 'attribution', null);
            $this->attribution->writeXmlContents($writer);
            $writer->endElement();
        }
        if ($this->qualifiers) {
            foreach ($this->qualifiers as $i => $x) {
                $writer->startElementNs('gx', 'qualifier', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
    }
}
