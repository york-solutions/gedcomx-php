<?php
/**
 * Generated by <a href="http://enunciate.codehaus.org">Enunciate</a>.
 */

namespace Gedcomx\Conclusion;

use Gedcomx\Common\ExtensibleData;
use Gedcomx\Records\Field;
use Gedcomx\Rt\GedcomxModelVisitor;

/**
 * A form of a name.
 */
class NameForm extends ExtensibleData
{
    /**
     * The language of the conclusion.
     *
     * @var string
     */
    private $lang;

    /**
     * The full text of the name form.
     *
     * @var string
     */
    private $fullText;

    /**
     * The different parts of the name form.
     *
     * @var \Gedcomx\Conclusion\NamePart[]
     */
    private $parts;

    /**
     * The references to the record fields being used as evidence.
     *
     * @var \Gedcomx\Records\Field[]
     */
    private $fields;

    /**
     * Constructs a NameForm from a (parsed) JSON hash
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
     * The language of the conclusion.
     *
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * The language of the conclusion.
     *
     * @param string $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * The full text of the name form.
     *
     * @return string
     */
    public function getFullText()
    {
        return $this->fullText;
    }

    /**
     * The full text of the name form.
     *
     * @param string $fullText
     */
    public function setFullText($fullText)
    {
        $this->fullText = $fullText;
    }

    /**
     * The different parts of the name form.
     *
     * @return \Gedcomx\Conclusion\NamePart[]
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * The different parts of the name form.
     *
     * @param \Gedcomx\Conclusion\NamePart[] $parts
     */
    public function setParts(array $parts)
    {
        $this->parts = $parts;
    }

    /**
     * The references to the record fields being used as evidence.
     *
     * @return \Gedcomx\Records\Field[]
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * The references to the record fields being used as evidence.
     *
     * @param \Gedcomx\Records\Field[] $fields
     */
    public function setFields(array $fields)
    {
        $this->fields = $fields;
    }

    /**
     * Returns the associative array for this NameForm
     *
     * @return array
     */
    public function toArray()
    {
        $a = parent::toArray();
        if ($this->lang) {
            $a["lang"] = $this->lang;
        }
        if ($this->fullText) {
            $a["fullText"] = $this->fullText;
        }
        if ($this->parts) {
            $ab = array();
            foreach ($this->parts as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['parts'] = $ab;
        }
        if ($this->fields) {
            $ab = array();
            foreach ($this->fields as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['fields'] = $ab;
        }

        return $a;
    }

    /**
     * Initializes this NameForm from an associative array
     *
     * @param array $o
     */
    public function initFromArray(array $o)
    {
        if (isset($o['lang'])) {
            $this->lang = $o["lang"];
            unset($o['lang']);
        }
        if (isset($o['fullText'])) {
            $this->fullText = $o["fullText"];
            unset($o['fullText']);
        }
        $this->parts = array();
        if (isset($o['parts'])) {
            foreach ($o['parts'] as $i => $x) {
                $this->parts[$i] = $x instanceof NamePart ? $x : new NamePart($x);
            }
            unset($o['parts']);
        }
        $this->fields = array();
        if (isset($o['fields'])) {
            foreach ($o['fields'] as $i => $x) {
                $this->fields[$i] = $x instanceof Field ? $x : new Field($x);
            }
            unset($o['fields']);
        }
        parent::initFromArray($o);
    }

    public function accept(GedcomxModelVisitor $visitor)
    {
        $visitor->visitNameForm($this);
    }

    /**
     * Sets a known child element of NameForm from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     *
     * @return bool Whether a child element was set.
     */
    protected function setKnownChildElement(\XMLReader $xml)
    {
        $happened = parent::setKnownChildElement($xml);
        if ($happened) {
            return true;
        } else {
            if (($xml->localName == 'fullText') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
                $child = '';
                while ($xml->read() && $xml->hasValue) {
                    $child = $child . $xml->value;
                }
                $this->fullText = $child;
                $happened = true;
            } else {
                if (($xml->localName == 'part') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
                    $child = new NamePart($xml);
                    if (!isset($this->parts)) {
                        $this->parts = array();
                    }
                    array_push($this->parts, $child);
                    $happened = true;
                } else {
                    if (($xml->localName == 'field') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
                        $child = new Field($xml);
                        if (!isset($this->fields)) {
                            $this->fields = array();
                        }
                        array_push($this->fields, $child);
                        $happened = true;
                    }
                }
            }
        }

        return $happened;
    }

    /**
     * Sets a known attribute of NameForm from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     *
     * @return bool Whether an attribute was set.
     */
    protected function setKnownAttribute(\XMLReader $xml)
    {
        if (parent::setKnownAttribute($xml)) {
            return true;
        } else {
            if (($xml->localName == 'lang') && ($xml->namespaceURI == 'http://www.w3.org/XML/1998/namespace')) {
                $this->lang = $xml->value;

                return true;
            }
        }

        return false;
    }

    /**
     * Writes the contents of this NameForm to an XML writer. The startElement is expected to be already provided.
     *
     * @param \XMLWriter $writer The XML writer.
     */
    public function writeXmlContents(\XMLWriter $writer)
    {
        if ($this->lang) {
            $writer->writeAttribute('xml:lang', $this->lang);
        }
        parent::writeXmlContents($writer);
        if ($this->fullText) {
            $writer->startElementNs('gx', 'fullText', null);
            $writer->text($this->fullText);
            $writer->endElement();
        }
        if ($this->parts) {
            foreach ($this->parts as $i => $x) {
                $writer->startElementNs('gx', 'part', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
        if ($this->fields) {
            foreach ($this->fields as $i => $x) {
                $writer->startElementNs('gx', 'field', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
    }

    /**
     * String value of NameForm
     *
     * @return string
     */
    public function toString()
    {
        return $this->fullText;
    }
}
