<?php
/**
 *
 * 
 *
 * Generated by <a href="http://enunciate.codehaus.org">Enunciate</a>.
 *
 */

namespace Gedcomx\Links;

/**
 * A hypermedia link, used to drive the state of a hypermedia-enabled genealogical data application.
 */
class Link
{
    const JSON_IDENTIFIER = 'links';
    /**
     * The language of the resource being linked to.
     *
     * @var string
     */
    private $hreflang;

    /**
     * A URI template per &lt;a href=&quot;http://tools.ietf.org/html/rfc6570&quot;&gt;RFC 6570&lt;/a&gt;, used to link to a range of
     * URIs, such as for the purpose of linking to a query.
     *
     * @var string
     */
    private $template;

    /**
     * Human-readable information about the link.
     *
     * @var string
     */
    private $title;

    /**
     * Metadata about the available media type(s) of the resource being linked to.
     *
     * @var string
     */
    private $allow;

    /**
     * Metadata about the available media type(s) of the resource being linked to.
     *
     * @var string
     */
    private $accept;

    /**
     * The link relationship.
     *
     * @var string
     */
    private $rel;

    /**
     * Metadata about the available media type(s) of the resource being linked to.
     *
     * @var string
     */
    private $type;

    /**
     * The target IRI of the link.
     *
     * @var string
     */
    private $href;

    /**
     * Constructs a Link from a (parsed) JSON hash
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
     * The language of the resource being linked to.
     *
     * @return string
     */
    public function getHreflang()
    {
        return $this->hreflang;
    }

    /**
     * The language of the resource being linked to.
     *
     * @param string $hreflang
     */
    public function setHreflang($hreflang)
    {
        $this->hreflang = $hreflang;
    }
    /**
     * A URI template per &lt;a href=&quot;http://tools.ietf.org/html/rfc6570&quot;&gt;RFC 6570&lt;/a&gt;, used to link to a range of
       * URIs, such as for the purpose of linking to a query.
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * A URI template per &lt;a href=&quot;http://tools.ietf.org/html/rfc6570&quot;&gt;RFC 6570&lt;/a&gt;, used to link to a range of
       * URIs, such as for the purpose of linking to a query.
     *
     * @param string $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }
    /**
     * Human-readable information about the link.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Human-readable information about the link.
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    /**
     * Metadata about the available media type(s) of the resource being linked to.
     *
     * @return string
     */
    public function getAllow()
    {
        return $this->allow;
    }

    /**
     * Metadata about the available media type(s) of the resource being linked to.
     *
     * @param string $allow
     */
    public function setAllow($allow)
    {
        $this->allow = $allow;
    }
    /**
     * Metadata about the available media type(s) of the resource being linked to.
     *
     * @return string
     */
    public function getAccept()
    {
        return $this->accept;
    }

    /**
     * Metadata about the available media type(s) of the resource being linked to.
     *
     * @param string $accept
     */
    public function setAccept($accept)
    {
        $this->accept = $accept;
    }
    /**
     * The link relationship.
     *
     * @return string
     */
    public function getRel()
    {
        return $this->rel;
    }

    /**
     * The link relationship.
     *
     * @param string $rel
     */
    public function setRel($rel)
    {
        $this->rel = $rel;
    }
    /**
     * Metadata about the available media type(s) of the resource being linked to.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Metadata about the available media type(s) of the resource being linked to.
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
    /**
     * The target IRI of the link.
     *
     * @return string
     */
    public function getHref()
    {
        if( is_object($this->href)){
            return $this->href . "";
        }
        return $this->href;
    }

    /**
     * The target IRI of the link.
     *
     * @param string $href
     */
    public function setHref($href)
    {
        $this->href = $href;
    }
    /**
     * Returns the associative array for this Link
     *
     * @return array
     */
    public function toArray()
    {
        $a = array();
        if ($this->hreflang) {
            $a["hreflang"] = $this->hreflang;
        }
        if ($this->template) {
            $a["template"] = $this->template;
        }
        if ($this->title) {
            $a["title"] = $this->title;
        }
        if ($this->allow) {
            $a["allow"] = $this->allow;
        }
        if ($this->accept) {
            $a["accept"] = $this->accept;
        }
        if ($this->rel) {
            $a["rel"] = $this->rel;
        }
        if ($this->type) {
            $a["type"] = $this->type;
        }
        if ($this->href) {
            $a["href"] = $this->href;
        }
        return $a;
    }

    /**
     * Returns the JSON string for this Link
     *
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * Initializes this Link from an associative array
     *
     * @param array $o
     */
    public function initFromArray($o)
    {
        if (isset($o['hreflang'])) {
            $this->hreflang = $o["hreflang"];
        }
        if (isset($o['template'])) {
            $this->template = $o["template"];
        }
        if (isset($o['title'])) {
            $this->title = $o["title"];
        }
        if (isset($o['allow'])) {
            $this->allow = $o["allow"];
        }
        if (isset($o['accept'])) {
            $this->accept = $o["accept"];
        }
        if (isset($o['rel'])) {
            $this->rel = $o["rel"];
        }
        if (isset($o['type'])) {
            $this->type = $o["type"];
        }
        if (isset($o['href'])) {
            $this->href = $o["href"];
        }
        if (isset($o['url'])) {
            $this->href = $o["url"];
        }
    }

    /**
     * Initializes this Link from an XML reader.
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
     * Sets a known child element of Link from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether a child element was set.
     */
    protected function setKnownChildElement($xml) {
        return false;
    }

    /**
     * Sets a known attribute of Link from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether an attribute was set.
     */
    protected function setKnownAttribute($xml) {
        if (($xml->localName == 'hreflang') && (empty($xml->namespaceURI))) {
            $this->hreflang = $xml->value;
            return true;
        }
        if (($xml->localName == 'template') && (empty($xml->namespaceURI))) {
            $this->template = $xml->value;
            return true;
        }
        if (($xml->localName == 'title') && (empty($xml->namespaceURI))) {
            $this->title = $xml->value;
            return true;
        }
        if (($xml->localName == 'allow') && (empty($xml->namespaceURI))) {
            $this->allow = $xml->value;
            return true;
        }
        if (($xml->localName == 'accept') && (empty($xml->namespaceURI))) {
            $this->accept = $xml->value;
            return true;
        }
        if (($xml->localName == 'rel') && (empty($xml->namespaceURI))) {
            $this->rel = $xml->value;
            return true;
        }
        if (($xml->localName == 'type') && (empty($xml->namespaceURI))) {
            $this->type = $xml->value;
            return true;
        }
        if (($xml->localName == 'href') && (empty($xml->namespaceURI))) {
            $this->href = $xml->value;
            return true;
        }

        return false;
    }

    /**
     * Writes this Link to an XML writer.
     *
     * @param \XMLWriter $writer The XML writer.
     * @param bool $includeNamespaces Whether to write out the namespaces in the element.
     */
    public function toXml($writer, $includeNamespaces = true)
    {
        $writer->startElementNS('gx', 'link', null);
        if ($includeNamespaces) {
            $writer->writeAttributeNs('xmlns', 'gx', null, 'http://gedcomx.org/v1/');
        }
        $this->writeXmlContents($writer);
        $writer->endElement();
    }

    /**
     * Writes the contents of this Link to an XML writer. The startElement is expected to be already provided.
     *
     * @param \XMLWriter $writer The XML writer.
     */
    public function writeXmlContents($writer)
    {
        if ($this->hreflang) {
            $writer->writeAttribute('hreflang', $this->hreflang);
        }
        if ($this->template) {
            $writer->writeAttribute('template', $this->template);
        }
        if ($this->title) {
            $writer->writeAttribute('title', $this->title);
        }
        if ($this->allow) {
            $writer->writeAttribute('allow', $this->allow);
        }
        if ($this->accept) {
            $writer->writeAttribute('accept', $this->accept);
        }
        if ($this->rel) {
            $writer->writeAttribute('rel', $this->rel);
        }
        if ($this->type) {
            $writer->writeAttribute('type', $this->type);
        }
        if ($this->href) {
            $writer->writeAttribute('href', $this->href);
        }
    }
}
