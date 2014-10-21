<?php
/**
 *
 * 
 *
 * Generated by <a href="http://enunciate.codehaus.org">Enunciate</a>.
 *
 */

namespace Gedcomx\Conclusion;
use Gedcomx\Types\NamePartType;

/**
 * A name conclusion.
 */
class Name extends \Gedcomx\Conclusion\Conclusion
{
    const JSON_IDENTIFIER = 'names';
    /**
     * The type of the name.
     *
     * @var string
     */
    private $type;

    /**
     * Whether the conclusion is preferred above other conclusions of the same type. Useful, for example, for display purposes.
     *
     * @var boolean
     */
    private $preferred;

    /**
     * The date the name was first applied or adopted.
     *
     * @var \Gedcomx\Conclusion\DateInfo
     */
    private $date;

    /**
     * Alternate forms of the name, such as the romanized form of a non-latin name.
     *
     * @var \Gedcomx\Conclusion\NameForm[]
     */
    private $nameForms;

    /**
     * Constructs a Name from a (parsed) JSON hash
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
     * The type of the name.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * The type of the name.
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
    /**
     * Whether the conclusion is preferred above other conclusions of the same type. Useful, for example, for display purposes.
     *
     * @return boolean
     */
    public function getPreferred()
    {
        return $this->preferred;
    }

    /**
     * Whether the conclusion is preferred above other conclusions of the same type. Useful, for example, for display purposes.
     *
     * @param boolean $preferred
     */
    public function setPreferred($preferred)
    {
        $this->preferred = $preferred;
    }
    /**
     * The date the name was first applied or adopted.
     *
     * @return \Gedcomx\Conclusion\DateInfo
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * The date the name was first applied or adopted.
     *
     * @param \Gedcomx\Conclusion\DateInfo $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
    /**
     * Alternate forms of the name, such as the romanized form of a non-latin name.
     *
     * @return \Gedcomx\Conclusion\NameForm[]
     */
    public function getNameForms()
    {
        return $this->nameForms;
    }

    /**
     * Alternate forms of the name, such as the romanized form of a non-latin name.
     *
     * @param \Gedcomx\Conclusion\NameForm[] $nameForms
     */
    public function setNameForms($nameForms)
    {
        $this->nameForms = $nameForms;
    }

    /**
     * Returns the associative array for this Name
     *
     * @return array
     */
    public function toArray()
    {
        $a = parent::toArray();
        if ($this->type) {
            $a["type"] = $this->type;
        }
        if ($this->preferred) {
            $a["preferred"] = $this->preferred;
        }
        if ($this->date) {
            $a["date"] = $this->date->toArray();
        }
        if ($this->nameForms) {
            $ab = array();
            foreach ($this->nameForms as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['nameForms'] = $ab;
        }
        return $a;
    }


    /**
     * Initializes this Name from an associative array
     *
     * @param array $o
     */
    public function initFromArray($o)
    {
        parent::initFromArray($o);
        if (isset($o['type'])) {
            $this->type = $o["type"];
        }
        if (isset($o['preferred'])) {
            $this->preferred = $o["preferred"];
        }
        if (isset($o['date'])) {
            $this->date = $o["date"] instanceof DateInfo ? $o["date"] : new DateInfo($o["date"]);
        }
        $this->nameForms = array();
        if (isset($o['nameForms'])) {
            foreach ($o['nameForms'] as $i => $x) {
                $this->nameForms[$i] = $x instanceof NameForm ? $x : new NameForm($x);
            }
        }
    }

    /**
     * Sets a known child element of Name from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether a child element was set.
     */
    protected function setKnownChildElement($xml) {
        $happened = parent::setKnownChildElement($xml);
        if ($happened) {
          return true;
        }
        else if (($xml->localName == 'preferred') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
            $child = '';
            while ($xml->read() && $xml->hasValue) {
                $child = $child . $xml->value;
            }
            $this->preferred = $child;
            $happened = true;
        }
        else if (($xml->localName == 'date') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
            $child = new \Gedcomx\Conclusion\DateInfo($xml);
            $this->date = $child;
            $happened = true;
        }
        else if (($xml->localName == 'nameForm') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
            $child = new \Gedcomx\Conclusion\NameForm($xml);
            if (!isset($this->nameForms)) {
                $this->nameForms = array();
            }
            array_push($this->nameForms, $child);
            $happened = true;
        }
        return $happened;
    }

    /**
     * Sets a known attribute of Name from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether an attribute was set.
     */
    protected function setKnownAttribute($xml) {
        if (parent::setKnownAttribute($xml)) {
            return true;
        }
        else if (($xml->localName == 'type') && (empty($xml->namespaceURI))) {
            $this->type = $xml->value;
            return true;
        }

        return false;
    }

    /**
     * Writes this Name to an XML writer.
     *
     * @param \XMLWriter $writer The XML writer.
     * @param bool $includeNamespaces Whether to write out the namespaces in the element.
     */
    public function toXml($writer, $includeNamespaces = true)
    {
        $writer->startElementNS('gx', 'name', null);
        if ($includeNamespaces) {
            $writer->writeAttributeNs('xmlns', 'gx', null, 'http://gedcomx.org/v1/');
        }
        $this->writeXmlContents($writer);
        $writer->endElement();
    }

    /**
     * Writes the contents of this Name to an XML writer. The startElement is expected to be already provided.
     *
     * @param \XMLWriter $writer The XML writer.
     */
    public function writeXmlContents($writer)
    {
        if ($this->type) {
            $writer->writeAttribute('type', $this->type);
        }
        parent::writeXmlContents($writer);
        if ($this->preferred) {
            $writer->startElementNs('gx', 'preferred', null);
            $writer->text($this->preferred);
            $writer->endElement();
        }
        if ($this->date) {
            $writer->startElementNs('gx', 'date', null);
            $this->date->writeXmlContents($writer);
            $writer->endElement();
        }
        if ($this->nameForms) {
            foreach ($this->nameForms as $i => $x) {
                $writer->startElementNs('gx', 'nameForm', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
    }

    public function toString(){
        if( !empty($this->nameForms) ){
            return $this->nameForms[0]->toString();
        }

        return '';
    }

}
