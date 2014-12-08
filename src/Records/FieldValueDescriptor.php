<?php
/**
 * Generated by <a href="http://enunciate.codehaus.org">Enunciate</a>.
 */

namespace Gedcomx\Records;

use Gedcomx\Common\TextValue;
use Gedcomx\Links\HypermediaEnabledData;

/**
 * A way a field is to be displayed to a user.
 */
class FieldValueDescriptor extends HypermediaEnabledData
{

    /**
     * Whether the treatment of the field value is optional. Used to determine whether it should be displayed even if
     * the value is empty.
     *
     * @var boolean
     */
    private $optional;

    /**
     * The type of the field value.
     *
     * @var string
     */
    private $type;

    /**
     * The id of the label applicable to the field value
     *
     * @var string
     */
    private $labelId;

    /**
     * The labels to be used for display purposes.
     *
     * @var TextValue[]
     */
    private $displayLabels;

    /**
     * Constructs a FieldValueDescriptor from a (parsed) JSON hash
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
     * Whether the treatment of the field value is optional. Used to determine whether it should be displayed even if
     * the value is empty.
     *
     * @return boolean
     */
    public function getOptional()
    {
        return $this->optional;
    }

    /**
     * Whether the treatment of the field value is optional. Used to determine whether it should be displayed even if
     * the value is empty.
     *
     * @param boolean $optional
     */
    public function setOptional($optional)
    {
        $this->optional = $optional;
    }

    /**
     * The type of the field value.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * The type of the field value.
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * The id of the label applicable to the field value
     *
     * @return string
     */
    public function getLabelId()
    {
        return $this->labelId;
    }

    /**
     * The id of the label applicable to the field value
     *
     * @param string $labelId
     */
    public function setLabelId($labelId)
    {
        $this->labelId = $labelId;
    }

    /**
     * The labels to be used for display purposes.
     *
     * @return \Gedcomx\Common\TextValue[]
     */
    public function getDisplayLabels()
    {
        return $this->displayLabels;
    }

    /**
     * The labels to be used for display purposes.
     *
     * @param \Gedcomx\Common\TextValue[] $displayLabels
     */
    public function setDisplayLabels(array $displayLabels)
    {
        $this->displayLabels = $displayLabels;
    }

    /**
     * Returns the associative array for this FieldValueDescriptor
     *
     * @return array
     */
    public function toArray()
    {
        $a = parent::toArray();
        if ($this->optional) {
            $a["optional"] = $this->optional;
        }
        if ($this->type) {
            $a["type"] = $this->type;
        }
        if ($this->labelId) {
            $a["labelId"] = $this->labelId;
        }
        if ($this->displayLabels) {
            $ab = array();
            foreach ($this->displayLabels as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['labels'] = $ab;
        }

        return $a;
    }

    /**
     * Initializes this FieldValueDescriptor from an associative array
     *
     * @param array $o
     */
    public function initFromArray(array $o)
    {
        if (isset($o['optional'])) {
            $this->optional = $o["optional"];
            unset($o['optional']);
        }
        if (isset($o['type'])) {
            $this->type = $o["type"];
            unset($o['type']);
        }
        if (isset($o['labelId'])) {
            $this->labelId = $o["labelId"];
            unset($o['labelId']);
        }
        $this->displayLabels = array();
        if (isset($o['labels'])) {
            foreach ($o['labels'] as $i => $x) {
                $this->displayLabels[$i] = new TextValue($x);
            }
            unset($o['labels']);
        }
        parent::initFromArray($o);
    }

    /**
     * Sets a known child element of FieldValueDescriptor from an XML reader.
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
            if (($xml->localName == 'label') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
                $child = new TextValue($xml);
                if (!isset($this->displayLabels)) {
                    $this->displayLabels = array();
                }
                array_push($this->displayLabels, $child);
                $happened = true;
            }
        }

        return $happened;
    }

    /**
     * Sets a known attribute of FieldValueDescriptor from an XML reader.
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
            if (($xml->localName == 'optional') && (empty($xml->namespaceURI))) {
                $this->optional = $xml->value;

                return true;
            } else {
                if (($xml->localName == 'type') && (empty($xml->namespaceURI))) {
                    $this->type = $xml->value;

                    return true;
                } else {
                    if (($xml->localName == 'labelId') && (empty($xml->namespaceURI))) {
                        $this->labelId = $xml->value;

                        return true;
                    }
                }
            }
        }

        return false;
    }

    /**
     * Writes the contents of this FieldValueDescriptor to an XML writer. The startElement is expected to be already
     * provided.
     *
     * @param \XMLWriter $writer The XML writer.
     */
    public function writeXmlContents(\XMLWriter $writer)
    {
        if ($this->optional) {
            $writer->writeAttribute('optional', $this->optional);
        }
        if ($this->type) {
            $writer->writeAttribute('type', $this->type);
        }
        if ($this->labelId) {
            $writer->writeAttribute('labelId', $this->labelId);
        }
        parent::writeXmlContents($writer);
        if ($this->displayLabels) {
            foreach ($this->displayLabels as $i => $x) {
                $writer->startElementNs('gx', 'label', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
    }
}
