<?php
/**
 *
 * 
 *
 * Generated by <a href="http://enunciate.codehaus.org">Enunciate</a>.
 *
 */

namespace Gedcomx\Extensions\FamilySearch\Platform\Tree;

use Gedcomx\Common\ResourceReference;

/**
 * Information about a change.
 */
class ChangeInfo
{
    /**
     * An optional modifier for the object to which the operation applies.
     *
     * @var string
     */
    private $objectModifier;

    /**
     * The operation of the change.
     *
     * @var string
     */
    private $operation;

    /**
     * The reason for the change.
     *
     * @var string
     */
    private $reason;

    /**
     * The type of the object to which the operation applies.
     *
     * @var string
     */
    private $objectType;

    /**
     * The subject representing the original value(s) that existed before the change.
     *
     * @var ResourceReference
     */
    private $original;

    /**
     * The parent change that triggered, caused, or included this change.
     *
     * @var ResourceReference
     */
    private $parent;

    /**
     * The subject representing the removed value(s) that existed before the change.
     *
     * @var ResourceReference
     */
    private $removed;

    /**
     * The subject representing the result of the change.
     *
     * @var ResourceReference
     */
    private $resulting;

    /**
     * Constructs a ChangeInfo from a (parsed) JSON hash
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
     * An optional modifier for the object to which the operation applies.
     *
     * @return string
     */
    public function getObjectModifier()
    {
        return $this->objectModifier;
    }

    /**
     * An optional modifier for the object to which the operation applies.
     *
     * @param string $objectModifier
     */
    public function setObjectModifier($objectModifier)
    {
        $this->objectModifier = $objectModifier;
    }
    /**
     * The operation of the change.
     *
     * @return string
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * The operation of the change.
     *
     * @param string $operation
     */
    public function setOperation($operation)
    {
        $this->operation = $operation;
    }
    /**
     * The reason for the change.
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * The reason for the change.
     *
     * @param string $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }
    /**
     * The type of the object to which the operation applies.
     *
     * @return string
     */
    public function getObjectType()
    {
        return $this->objectType;
    }

    /**
     * The type of the object to which the operation applies.
     *
     * @param string $objectType
     */
    public function setObjectType($objectType)
    {
        $this->objectType = $objectType;
    }
    /**
     * The subject representing the original value(s) that existed before the change.
     *
     * @return ResourceReference
     */
    public function getOriginal()
    {
        return $this->original;
    }

    /**
     * The subject representing the original value(s) that existed before the change.
     *
     * @param ResourceReference $original
     */
    public function setOriginal($original)
    {
        $this->original = $original;
    }
    /**
     * The parent change that triggered, caused, or included this change.
     *
     * @return ResourceReference
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * The parent change that triggered, caused, or included this change.
     *
     * @param ResourceReference $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }
    /**
     * The subject representing the removed value(s) that existed before the change.
     *
     * @return ResourceReference
     */
    public function getRemoved()
    {
        return $this->removed;
    }

    /**
     * The subject representing the removed value(s) that existed before the change.
     *
     * @param ResourceReference $removed
     */
    public function setRemoved($removed)
    {
        $this->removed = $removed;
    }
    /**
     * The subject representing the result of the change.
     *
     * @return ResourceReference
     */
    public function getResulting()
    {
        return $this->resulting;
    }

    /**
     * The subject representing the result of the change.
     *
     * @param ResourceReference $resulting
     */
    public function setResulting($resulting)
    {
        $this->resulting = $resulting;
    }
    /**
     * Returns the associative array for this ChangeInfo
     *
     * @return array
     */
    public function toArray()
    {
        $a = array();
        if ($this->objectModifier) {
            $a["objectModifier"] = $this->objectModifier;
        }
        if ($this->operation) {
            $a["operation"] = $this->operation;
        }
        if ($this->reason) {
            $a["reason"] = $this->reason;
        }
        if ($this->objectType) {
            $a["objectType"] = $this->objectType;
        }
        if ($this->original) {
            $a["original"] = $this->original->toArray();
        }
        if ($this->parent) {
            $a["parent"] = $this->parent->toArray();
        }
        if ($this->removed) {
            $a["removed"] = $this->removed->toArray();
        }
        if ($this->resulting) {
            $a["resulting"] = $this->resulting->toArray();
        }
        return $a;
    }

    /**
     * Returns the JSON string for this ChangeInfo
     *
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * Initializes this ChangeInfo from an associative array
     *
     * @param array $o
     */
    public function initFromArray($o)
    {
        if (isset($o['objectModifier'])) {
            $this->objectModifier = $o["objectModifier"];
        }
        if (isset($o['operation'])) {
            $this->operation = $o["operation"];
        }
        if (isset($o['reason'])) {
            $this->reason = $o["reason"];
        }
        if (isset($o['objectType'])) {
            $this->objectType = $o["objectType"];
        }
        if (isset($o['original'])) {
            $this->original = new ResourceReference($o["original"]);
        }
        if (isset($o['parent'])) {
            $this->parent = new ResourceReference($o["parent"]);
        }
        if (isset($o['removed'])) {
            $this->removed = new ResourceReference($o["removed"]);
        }
        if (isset($o['resulting'])) {
            $this->resulting = new ResourceReference($o["resulting"]);
        }
    }

    /**
     * Initializes this ChangeInfo from an XML reader.
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
                }
                else if (!$this->setKnownChildElement($xml)) {
                    $n = $xml->localName;
                    $ns = $xml->namespaceURI;
                    //skip the unknown element
                    while ($xml->nodeType != \XMLReader::END_ELEMENT && $xml->localName != $n && $xml->namespaceURI != $ns) {
                        $xml->read();
                    }
                }
                $xml->read(); //advance the reader.
            }
        }
    }


    /**
     * Sets a known child element of ChangeInfo from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether a child element was set.
     */
    protected function setKnownChildElement($xml) {
        $happened = false;
        if (($xml->localName == 'original') && ($xml->namespaceURI == 'http://familysearch.org/v1/')) {
            $child = new ResourceReference($xml);
            $this->original = $child;
            $happened = true;
        }
        else if (($xml->localName == 'parent') && ($xml->namespaceURI == 'http://familysearch.org/v1/')) {
            $child = new ResourceReference($xml);
            $this->parent = $child;
            $happened = true;
        }
        else if (($xml->localName == 'removed') && ($xml->namespaceURI == 'http://familysearch.org/v1/')) {
            $child = new ResourceReference($xml);
            $this->removed = $child;
            $happened = true;
        }
        else if (($xml->localName == 'resulting') && ($xml->namespaceURI == 'http://familysearch.org/v1/')) {
            $child = new ResourceReference($xml);
            $this->resulting = $child;
            $happened = true;
        }
        return $happened;
    }

    /**
     * Sets a known attribute of ChangeInfo from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether an attribute was set.
     */
    protected function setKnownAttribute($xml) {
        if (($xml->localName == 'objectModifier') && (empty($xml->namespaceURI))) {
            $this->objectModifier = $xml->value;
            return true;
        }
        if (($xml->localName == 'operation') && (empty($xml->namespaceURI))) {
            $this->operation = $xml->value;
            return true;
        }
        if (($xml->localName == 'reason') && (empty($xml->namespaceURI))) {
            $this->reason = $xml->value;
            return true;
        }
        if (($xml->localName == 'objectType') && (empty($xml->namespaceURI))) {
            $this->objectType = $xml->value;
            return true;
        }

        return false;
    }

    /**
     * Writes this ChangeInfo to an XML writer.
     *
     * @param \XMLWriter $writer The XML writer.
     * @param bool $includeNamespaces Whether to write out the namespaces in the element.
     */
    public function toXml($writer, $includeNamespaces = true)
    {
        $writer->startElementNS('fs', 'changeInfo', null);
        if ($includeNamespaces) {
            $writer->writeAttributeNs('xmlns', 'gx', null, 'http://gedcomx.org/v1/');
            $writer->writeAttributeNs('xmlns', 'fs', null, 'http://familysearch.org/v1/');
        }
        $this->writeXmlContents($writer);
        $writer->endElement();
    }

    /**
     * Writes the contents of this ChangeInfo to an XML writer. The startElement is expected to be already provided.
     *
     * @param \XMLWriter $writer The XML writer.
     */
    public function writeXmlContents($writer)
    {
        if ($this->objectModifier) {
            $writer->writeAttribute('objectModifier', $this->objectModifier);
        }
        if ($this->operation) {
            $writer->writeAttribute('operation', $this->operation);
        }
        if ($this->reason) {
            $writer->writeAttribute('reason', $this->reason);
        }
        if ($this->objectType) {
            $writer->writeAttribute('objectType', $this->objectType);
        }
        if ($this->original) {
            $writer->startElementNs('fs', 'original', null);
            $this->original->writeXmlContents($writer);
            $writer->endElement();
        }
        if ($this->parent) {
            $writer->startElementNs('fs', 'parent', null);
            $this->parent->writeXmlContents($writer);
            $writer->endElement();
        }
        if ($this->removed) {
            $writer->startElementNs('fs', 'removed', null);
            $this->removed->writeXmlContents($writer);
            $writer->endElement();
        }
        if ($this->resulting) {
            $writer->startElementNs('fs', 'resulting', null);
            $this->resulting->writeXmlContents($writer);
            $writer->endElement();
        }
    }
}
