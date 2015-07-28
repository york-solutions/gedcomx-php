<?php
/**
 * Generated by <a href="http://enunciate.codehaus.org">Enunciate</a>.

 */

namespace Gedcomx\Atom;

use Gedcomx\Gedcomx;

/**
 *
 */
class Content
{

    /**
     * The type of the content.
     * @var string
     */
    private $type;

    /**
     * The genealogical data associated with this entry.
     *
     * @var \Gedcomx\Gedcomx
     */
    private $gedcomx;

    /**
     * Constructs a Content from a (parsed) JSON hash
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
     * The type of the content.
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * The type of the content.
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * The genealogical data associated with this entry.
     *
     * @return \Gedcomx\Gedcomx
     */
    public function getGedcomx()
    {
        return $this->gedcomx;
    }

    /**
     * The genealogical data associated with this entry.
     *
     * @param \Gedcomx\Gedcomx $gedcomx
     */
    public function setGedcomx(Gedcomx $gedcomx)
    {
        $this->gedcomx = $gedcomx;
    }

    /**
     * Returns the associative array for this Content
     *
     * @return array
     */
    public function toArray()
    {
        $a = array();
        if ($this->type) {
            $a["type"] = $this->type;
        }
        if ($this->gedcomx) {
            $a["gedcomx"] = $this->gedcomx->toArray();
        }

        return $a;
    }

    /**
     * Returns the JSON string for this Content
     *
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * Initializes this Content from an associative array
     *
     * @param array $o
     */
    public function initFromArray($o)
    {
        if (isset($o['type'])) {
            $this->type = $o["type"];
        }
        if (isset($o['gedcomx'])) {
            $this->gedcomx = new Gedcomx($o["gedcomx"]);
        }
    }

    /**
     * Initializes this Content from an XML reader.
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
     * Sets a known child element of Content from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     *
     * @return bool Whether a child element was set.
     */
    protected function setKnownChildElement($xml)
    {
        $happened = false;
        if (($xml->localName == 'gedcomx') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
            $child = new Gedcomx($xml);
            $this->gedcomx = $child;
            $happened = true;
        }

        return $happened;
    }

    /**
     * Sets a known attribute of Content from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     *
     * @return bool Whether an attribute was set.
     */
    protected function setKnownAttribute($xml)
    {
        if (($xml->localName == 'type') && (empty($xml->namespaceURI))) {
            $this->type = $xml->value;

            return true;
        }

        return false;
    }

    /**
     * Writes the contents of this Content to an XML writer. The startElement is expected to be already provided.
     *
     * @param \XMLWriter $writer The XML writer.
     */
    public function writeXmlContents($writer)
    {
        if ($this->type) {
            $writer->writeAttribute('type', $this->type);
        }
        if ($this->gedcomx) {
            $writer->startElementNs('gx', 'gedcomx', null);
            $this->gedcomx->writeXmlContents($writer);
            $writer->endElement();
        }
    }
}