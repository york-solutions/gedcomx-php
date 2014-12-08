<?php
/**
 * Generated by <a href="http://enunciate.codehaus.org">Enunciate</a>.
 */

namespace Gedcomx\Conclusion;

use Gedcomx\Common\ResourceReference;
use Gedcomx\Common\TextValue;
use Gedcomx\Rt\GedcomxModelVisitor;

/**
 * A PlaceDescription is used to describe the details of a place in terms of its name
 * and possibly its type, time period, and/or a geospatial description -- a description
 * of a place as a snapshot in time.
 */
class PlaceDescription extends Subject
{

    /**
     * An implementation-specific uniform resource identifier (URI) used to identify the type of a place (e.g.,
     * address, city, county, province, state, country, etc.).
     *
     * @var string
     */
    private $type;

    /**
     * An ordered list of standardized (or normalized), fully-qualified (in terms of what is known of the applicable
     * jurisdictional hierarchy) names for this place that are applicable to this description of this place.
     *
     * @var \Gedcomx\Common\TextValue[]
     */
    private $names;

    /**
     * A description of the time period to which this place description is relevant.
     *
     * @var \Gedcomx\Conclusion\DateInfo
     */
    private $temporalDescription;

    /**
     * Degrees north or south of the Equator.
     *
     * @var double
     */
    private $latitude;

    /**
     * Angular distance in degrees, relative to the Prime Meridian.
     *
     * @var double
     */
    private $longitude;

    /**
     * A reference to a geospatial description of this place.
     *
     * @var \Gedcomx\Common\ResourceReference
     */
    private $spatialDescription;

    /**
     * A reference to a description of the jurisdiction this place.
     *
     * @var \Gedcomx\Common\ResourceReference
     */
    private $jurisdiction;

    /**
     * Display properties for the place. Display properties are not specified by GEDCOM X core, but as extension
     * elements by GEDCOM X RS.
     *
     * @var PlaceDisplayProperties
     */
    private $displayExtension;

    /**
     * Constructs a PlaceDescription from a (parsed) JSON hash
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
     * An implementation-specific uniform resource identifier (URI) used to identify the type of a place (e.g.,
     * address, city, county, province, state, country, etc.).
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * An implementation-specific uniform resource identifier (URI) used to identify the type of a place (e.g.,
     * address, city, county, province, state, country, etc.).
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * An ordered list of standardized (or normalized), fully-qualified (in terms of what is known of the applicable
     * jurisdictional hierarchy) names for this place that are applicable to this description of this place.
     *
     * @return \Gedcomx\Common\TextValue[]
     */
    public function getNames()
    {
        return $this->names;
    }

    /**
     * An ordered list of standardized (or normalized), fully-qualified (in terms of what is known of the applicable
     * jurisdictional hierarchy) names for this place that are applicable to this description of this place.
     *
     * @param \Gedcomx\Common\TextValue[] $names
     */
    public function setNames(array $names)
    {
        $this->names = $names;
    }

    /**
     * A description of the time period to which this place description is relevant.
     *
     * @return \Gedcomx\Conclusion\DateInfo
     */
    public function getTemporalDescription()
    {
        return $this->temporalDescription;
    }

    /**
     * A description of the time period to which this place description is relevant.
     *
     * @param \Gedcomx\Conclusion\DateInfo $temporalDescription
     */
    public function setTemporalDescription(DateInfo $temporalDescription)
    {
        $this->temporalDescription = $temporalDescription;
    }

    /**
     * Degrees north or south of the Equator.
     *
     * @return double
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Degrees north or south of the Equator.
     *
     * @param double $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Angular distance in degrees, relative to the Prime Meridian.
     *
     * @return double
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Angular distance in degrees, relative to the Prime Meridian.
     *
     * @param double $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * A reference to a geospatial description of this place.
     *
     * @return \Gedcomx\Common\ResourceReference
     */
    public function getSpatialDescription()
    {
        return $this->spatialDescription;
    }

    /**
     * A reference to a geospatial description of this place.
     *
     * @param \Gedcomx\Common\ResourceReference $spatialDescription
     */
    public function setSpatialDescription(ResourceReference $spatialDescription)
    {
        $this->spatialDescription = $spatialDescription;
    }

    /**
     * A reference to a description of the jurisdiction this place.
     *
     * @return \Gedcomx\Common\ResourceReference
     */
    public function getJurisdiction()
    {
        return $this->jurisdiction;
    }

    /**
     * A reference to a description of the jurisdiction this place.
     *
     * @param \Gedcomx\Common\ResourceReference $jurisdiction
     */
    public function setJurisdiction(ResourceReference $jurisdiction)
    {
        $this->jurisdiction = $jurisdiction;
    }

    /**
     * Display properties for the place. Display properties are not specified by GEDCOM X core, but as extension
     * elements by GEDCOM X RS.
     *
     * @return PlaceDisplayProperties
     */
    public function getDisplayExtension()
    {
        return $this->displayExtension;
    }

    /**
     * Display properties for the place. Display properties are not specified by GEDCOM X core, but as extension
     * elements by GEDCOM X RS.
     *
     * @param PlaceDisplayProperties $displayExtension
     */
    public function setDisplayExtension(PlaceDisplayProperties $displayExtension)
    {
        $this->displayExtension = $displayExtension;
    }

    /**
     * Returns the associative array for this PlaceDescription
     *
     * @return array
     */
    public function toArray()
    {
        $a = parent::toArray();
        if ($this->type) {
            $a["type"] = $this->type;
        }
        if ($this->names) {
            $ab = array();
            foreach ($this->names as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['names'] = $ab;
        }
        if ($this->temporalDescription) {
            $a["temporalDescription"] = $this->temporalDescription->toArray();
        }
        if ($this->latitude) {
            $a["latitude"] = $this->latitude;
        }
        if ($this->longitude) {
            $a["longitude"] = $this->longitude;
        }
        if ($this->spatialDescription) {
            $a["spatialDescription"] = $this->spatialDescription->toArray();
        }
        if ($this->jurisdiction) {
            $a["jurisdiction"] = $this->jurisdiction->toArray();
        }
        if ($this->displayExtension) {
            $a["display"] = $this->displayExtension->toArray();
        }

        return $a;
    }

    /**
     * Initializes this PlaceDescription from an associative array
     *
     * @param array $o
     */
    public function initFromArray(array $o)
    {
        if (isset($o['type'])) {
            $this->type = $o["type"];
            unset($o["type"]);
        }
        $this->names = array();
        if (isset($o['names'])) {
            foreach ($o['names'] as $i => $x) {
                $this->names[$i] = new TextValue($x);
            }
            unset($o["names"]);
        }
        if (isset($o['temporalDescription'])) {
            $this->temporalDescription = new DateInfo($o["temporalDescription"]);
            unset($o["temporalDescription"]);
        }
        if (isset($o['latitude'])) {
            $this->latitude = $o["latitude"];
            unset($o["latitude"]);
        }
        if (isset($o['longitude'])) {
            $this->longitude = $o["longitude"];
            unset($o["longitude"]);
        }
        if (isset($o['spatialDescription'])) {
            $this->spatialDescription = new ResourceReference($o["spatialDescription"]);
            unset($o["spatialDescription"]);
        }
        if (isset($o['jurisdiction'])) {
            $this->jurisdiction = new ResourceReference($o["jurisdiction"]);
            unset($o["jurisdiction"]);
        }
        if (isset($o['display'])) {
            $this->displayExtension = new PlaceDisplayProperties($o["display"]);
            unset($o["display"]);
        }
        parent::initFromArray($o);
    }

    public function accept(GedcomxModelVisitor $visitor)
    {
        $visitor->visitPlaceDescription($this);
    }

    /**
     * Sets a known child element of PlaceDescription from an XML reader.
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
            if (($xml->localName == 'name') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
                $child = new TextValue($xml);
                if (!isset($this->names)) {
                    $this->names = array();
                }
                array_push($this->names, $child);
                $happened = true;
            } else {
                if (($xml->localName == 'temporalDescription') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
                    $child = new DateInfo($xml);
                    $this->temporalDescription = $child;
                    $happened = true;
                } else {
                    if (($xml->localName == 'latitude') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
                        $child = '';
                        while ($xml->read() && $xml->hasValue) {
                            $child = $child . $xml->value;
                        }
                        $this->latitude = $child;
                        $happened = true;
                    } else {
                        if (($xml->localName == 'longitude') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
                            $child = '';
                            while ($xml->read() && $xml->hasValue) {
                                $child = $child . $xml->value;
                            }
                            $this->longitude = $child;
                            $happened = true;
                        } else {
                            if (($xml->localName == 'spatialDescription') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
                                $child = new ResourceReference($xml);
                                $this->spatialDescription = $child;
                                $happened = true;
                            } else {
                                if (($xml->localName == 'jurisdiction') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
                                    $child = new ResourceReference($xml);
                                    $this->jurisdiction = $child;
                                    $happened = true;
                                } else {
                                    if (($xml->localName == 'display') && ($xml->namespaceURI == 'http://gedcomx.org/v1/')) {
                                        $child = new PlaceDisplayProperties($xml);
                                        $this->displayExtension = $child;
                                        $happened = true;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return $happened;
    }

    /**
     * Sets a known attribute of PlaceDescription from an XML reader.
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
            if (($xml->localName == 'type') && (empty($xml->namespaceURI))) {
                $this->type = $xml->value;

                return true;
            }
        }

        return false;
    }

    /**
     * Writes the contents of this PlaceDescription to an XML writer. The startElement is expected to be already
     * provided.
     *
     * @param \XMLWriter $writer The XML writer.
     */
    public function writeXmlContents(\XMLWriter $writer)
    {
        if ($this->type) {
            $writer->writeAttribute('type', $this->type);
        }
        parent::writeXmlContents($writer);
        if ($this->names) {
            foreach ($this->names as $i => $x) {
                $writer->startElementNs('gx', 'name', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
        if ($this->temporalDescription) {
            $writer->startElementNs('gx', 'temporalDescription', null);
            $this->temporalDescription->writeXmlContents($writer);
            $writer->endElement();
        }
        if ($this->latitude) {
            $writer->startElementNs('gx', 'latitude', null);
            $writer->text($this->latitude);
            $writer->endElement();
        }
        if ($this->longitude) {
            $writer->startElementNs('gx', 'longitude', null);
            $writer->text($this->longitude);
            $writer->endElement();
        }
        if ($this->spatialDescription) {
            $writer->startElementNs('gx', 'spatialDescription', null);
            $this->spatialDescription->writeXmlContents($writer);
            $writer->endElement();
        }
        if ($this->jurisdiction) {
            $writer->startElementNs('gx', 'jurisdiction', null);
            $this->jurisdiction->writeXmlContents($writer);
            $writer->endElement();
        }
        if ($this->displayExtension) {
            $writer->startElementNs('gx', 'display', null);
            $this->displayExtension->writeXmlContents($writer);
            $writer->endElement();
        }
    }
}
