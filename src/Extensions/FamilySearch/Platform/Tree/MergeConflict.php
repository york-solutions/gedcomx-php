<?php

namespace Gedcomx\Extensions\FamilySearch\Platform\Tree;

use Gedcomx\Common\ResourceReference;

class MergeConflict
{
    /**
     * (no documentation provided)
     *
     * @var \Gedcomx\Common\ResourceReference
     */
    private $survivorResource;

    /**
     * (no documentation provided)
     *
     * @var \Gedcomx\Common\ResourceReference
     */
    private $duplicateResource;

    /**
     * Constructs a MergeConflict from a (parsed) JSON hash
     *
     * @param mixed $o Either an array (JSON) or an XMLReader.
     *
     * @throws \Exception
     */
    public function __construct($o = null)
    {
        if (is_array($o)) {
            $this->initFromArray($o);
        } else {
            if ($o instanceof \XMLReader) {
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
    }

    /**
     * (no documentation provided)
     *
     * @return \Gedcomx\Common\ResourceReference
     */
    public function getSurvivorResource()
    {
        return $this->survivorResource;
    }

    /**
     * (no documentation provided)
     *
     * @param \Gedcomx\Common\ResourceReference $survivorResource
     */
    public function setSurvivorResource($survivorResource)
    {
        $this->survivorResource = $survivorResource;
    }

    /**
     * (no documentation provided)
     *
     * @return \Gedcomx\Common\ResourceReference
     */
    public function getDuplicateResource()
    {
        return $this->duplicateResource;
    }

    /**
     * (no documentation provided)
     *
     * @param \Gedcomx\Common\ResourceReference $duplicateResource
     */
    public function setDuplicateResource(ResourceReference $duplicateResource)
    {
        $this->duplicateResource = $duplicateResource;
    }

    /**
     * Returns the associative array for this MergeConflict
     *
     * @return array
     */
    public function toArray()
    {
        $a = array();
        if ($this->survivorResource) {
            $a["survivorResource"] = $this->survivorResource->toArray();
        }
        if ($this->duplicateResource) {
            $a["duplicateResource"] = $this->duplicateResource->toArray();
        }

        return $a;
    }

    /**
     * Returns the JSON string for this MergeConflict
     *
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * Initializes this MergeConflict from an associative array
     *
     * @param array $o
     */
    public function initFromArray($o)
    {
        if (isset($o['survivorResource'])) {
            $this->survivorResource = new ResourceReference($o["survivorResource"]);
        }
        if (isset($o['duplicateResource'])) {
            $this->duplicateResource = new ResourceReference($o["duplicateResource"]);
        }
    }

    /**
     * Initializes this MergeConflict from an XML reader.
     *
     * @param \XMLReader $xml The reader to use to initialize this object.
     */
    public function initFromReader($xml)
    {
        $empty = $xml->isEmptyElement;

        if ($xml->hasAttributes) {
            $moreAttributes = $xml->moveToFirstAttribute();
            while ($moreAttributes) {
                if (!$this->setKnownAttribute($xml)) {
                    //skip unknown attributes...
                }
                $moreAttributes = $xml->moveToNextAttribute();
            }
        }

        if (!$empty) {
            $xml->read();
            while ($xml->nodeType != \XMLReader::END_ELEMENT) {
                if ($xml->nodeType != \XMLReader::ELEMENT) {
                    //no-op: skip any insignificant whitespace, comments, etc.
                } else {
                    if (!$this->setKnownChildElement($xml)) {
                        $n = $xml->localName;
                        $ns = $xml->namespaceURI;
                        //skip the unknown element
                        while ($xml->nodeType != \XMLReader::END_ELEMENT && $xml->localName != $n && $xml->namespaceURI != $ns) {
                            $xml->read();
                        }
                    }
                }
                $xml->read(); //advance the reader.
            }
        }
    }

    /**
     * Sets a known child element of MergeConflict from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     *
     * @return bool Whether a child element was set.
     */
    protected function setKnownChildElement($xml)
    {
        $happened = false;
        if (($xml->localName == 'survivorResource') && ($xml->namespaceURI == 'http://familysearch.org/v1/')) {
            $child = new ResourceReference($xml);
            $this->survivorResource = $child;
            $happened = true;
        } else {
            if (($xml->localName == 'duplicateResource') && ($xml->namespaceURI == 'http://familysearch.org/v1/')) {
                $child = new ResourceReference($xml);
                $this->duplicateResource = $child;
                $happened = true;
            }
        }

        return $happened;
    }

    /**
     * Sets a known attribute of MergeConflict from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     *
     * @return bool Whether an attribute was set.
     */
    protected function setKnownAttribute($xml)
    {

        return false;
    }

    /**
     * Writes this MergeConflict to an XML writer.
     *
     * @param \XMLWriter $writer            The XML writer.
     * @param bool       $includeNamespaces Whether to write out the namespaces in the element.
     */
    public function toXml($writer, $includeNamespaces = true)
    {
        $writer->startElementNS('fs', 'mergeConflict', null);
        if ($includeNamespaces) {
            $writer->writeAttributeNs('xmlns', 'gx', null, 'http://gedcomx.org/v1/');
            $writer->writeAttributeNs('xmlns', 'fs', null, 'http://familysearch.org/v1/');
        }
        $this->writeXmlContents($writer);
        $writer->endElement();
    }

    /**
     * Writes the contents of this MergeConflict to an XML writer. The startElement is expected to be already provided.
     *
     * @param \XMLWriter $writer The XML writer.
     */
    public function writeXmlContents($writer)
    {
        if ($this->survivorResource) {
            $writer->startElementNs('fs', 'survivorResource', null);
            $this->survivorResource->writeXmlContents($writer);
            $writer->endElement();
        }
        if ($this->duplicateResource) {
            $writer->startElementNs('fs', 'duplicateResource', null);
            $this->duplicateResource->writeXmlContents($writer);
            $writer->endElement();
        }
    }
}
