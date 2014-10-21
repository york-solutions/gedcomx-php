<?php
/**
 *
 * 
 *
 * Generated by <a href="http://enunciate.codehaus.org">Enunciate</a>.
 *
 */

namespace Gedcomx\Extensions\FamilySearch;

use Gedcomx\Extensions\FamilySearch\Platform\Discussions\Discussion;
use Gedcomx\Gedcomx;

/**
 * <p>The FamilySearch data types define serialization formats that are specific the FamilySearch developer platform. These
     * data formats are extensions of the <a href="http://gedcomx.org">GEDCOM X</a> media types and provide concepts and data types
     * that are specific to FamilySearch and therefore haven't been adopted into a formal, more general specification.</p>
 */
class FamilySearchPlatform extends Gedcomx
{
    const JSON_IDENTIFIER = 'familysearch';
    const JSON_MEDIA_TYPE = 'application/x-fs-v1+json';

    /**
     * The child-and-parents relationships for this data set.
     *
     * @var Platform\Tree\ChildAndParentsRelationship[]
     */
    private $childAndParentsRelationships;

    /**
     * The discussions included in this data set.
     *
     * @var Platform\Discussions\Discussion[]
     */
    private $discussions;

    /**
     * The users included in this genealogical data set.
     *
     * @var Platform\Users\User[]
     */
    private $users;

    /**
     * The merges for this data set.
     *
     * @var Platform\Tree\Merge[]
     */
    private $merges;

    /**
     * The merge analysis results for this data set.
     *
     * @var Platform\Tree\MergeAnalysis[]
     */
    private $mergeAnalyses;

    /**
     * The set of features defined in the platform API.
     *
     * @var Feature[]
     */
    private $features;

    /**
     * Constructs a FamilySearchPlatform from a (parsed) JSON hash
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
     * The child-and-parents relationships for this data set.
     *
     * @return Platform\Tree\ChildAndParentsRelationship[]
     */
    public function getChildAndParentsRelationships()
    {
        return $this->childAndParentsRelationships;
    }

    /**
     * The child-and-parents relationships for this data set.
     *
     * @param Platform\Tree\ChildAndParentsRelationship[] $childAndParentsRelationships
     */
    public function setChildAndParentsRelationships($childAndParentsRelationships)
    {
        $this->childAndParentsRelationships = $childAndParentsRelationships;
    }

    /**
     * Add a discussion to the data set.
     *
     * @param Platform\Discussions\Discussion $discussion The discussion to be added.
     */
    public function addDiscussion( Discussion $discussion ) {
        if ($discussion != null) {
            if ($this->discussions == null) {
                $this->discussions = array($discussion);
            } else {
                $this->discussions[] = $discussion;
            }
        }
    }

    /**
     * The discussions included in this data set.
     *
     * @return Platform\Discussions\Discussion[]
     */
    public function getDiscussions()
    {
        return $this->discussions;
    }

    /**
     * The discussions included in this data set.
     *
     * @param Platform\Discussions\Discussion[] $discussions
     */
    public function setDiscussions($discussions)
    {
        $this->discussions = $discussions;
    }
    /**
     * The users included in this genealogical data set.
     *
     * @return Platform\Users\User[]
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * The users included in this genealogical data set.
     *
     * @param Platform\Users\User[] $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }
    /**
     * The merges for this data set.
     *
     * @return Platform\Tree\Merge[]
     */
    public function getMerges()
    {
        return $this->merges;
    }

    /**
     * The merges for this data set.
     *
     * @param Platform\Tree\Merge[] $merges
     */
    public function setMerges($merges)
    {
        $this->merges = $merges;
    }
    /**
     * The merge analysis results for this data set.
     *
     * @return Platform\Tree\MergeAnalysis[]
     */
    public function getMergeAnalyses()
    {
        return $this->mergeAnalyses;
    }

    /**
     * The merge analysis results for this data set.
     *
     * @param Platform\Tree\MergeAnalysis[] $mergeAnalyses
     */
    public function setMergeAnalyses($mergeAnalyses)
    {
        $this->mergeAnalyses = $mergeAnalyses;
    }
    /**
     * The set of features defined in the platform API.
     *
     * @return Feature[]
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * The set of features defined in the platform API.
     *
     * @param Feature[] $features
     */
    public function setFeatures($features)
    {
        $this->features = $features;
    }
    /**
     * Returns the associative array for this FamilySearchPlatform
     *
     * @return array
     */
    public function toArray()
    {
        $a = parent::toArray();
        if ($this->childAndParentsRelationships) {
            $ab = array();
            foreach ($this->childAndParentsRelationships as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['childAndParentsRelationships'] = $ab;
        }
        if ($this->discussions) {
            $ab = array();
            foreach ($this->discussions as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['discussions'] = $ab;
        }
        if ($this->users) {
            $ab = array();
            foreach ($this->users as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['users'] = $ab;
        }
        if ($this->merges) {
            $ab = array();
            foreach ($this->merges as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['merges'] = $ab;
        }
        if ($this->mergeAnalyses) {
            $ab = array();
            foreach ($this->mergeAnalyses as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['mergeAnalyses'] = $ab;
        }
        if ($this->features) {
            $ab = array();
            foreach ($this->features as $i => $x) {
                $ab[$i] = $x->toArray();
            }
            $a['features'] = $ab;
        }
        return $a;
    }


    /**
     * Initializes this FamilySearchPlatform from an associative array
     *
     * @param array $o
     */
    public function initFromArray($o)
    {
        parent::initFromArray($o);
        $this->childAndParentsRelationships = array();
        if (isset($o['childAndParentsRelationships'])) {
            foreach ($o['childAndParentsRelationships'] as $i => $x) {
                $this->childAndParentsRelationships[$i] = new Platform\Tree\ChildAndParentsRelationship($x);
            }
        }
        $this->discussions = array();
        if (isset($o['discussions'])) {
            foreach ($o['discussions'] as $i => $x) {
                $this->discussions[$i] = new Platform\Discussions\Discussion($x);
            }
        }
        $this->users = array();
        if (isset($o['users'])) {
            foreach ($o['users'] as $i => $x) {
                $this->users[$i] = new Platform\Users\User($x);
            }
        }
        $this->merges = array();
        if (isset($o['merges'])) {
            foreach ($o['merges'] as $i => $x) {
                $this->merges[$i] = new Platform\Tree\Merge($x);
            }
        }
        $this->mergeAnalyses = array();
        if (isset($o['mergeAnalyses'])) {
            foreach ($o['mergeAnalyses'] as $i => $x) {
                $this->mergeAnalyses[$i] = new Platform\Tree\MergeAnalysis($x);
            }
        }
        $this->features = array();
        if (isset($o['features'])) {
            foreach ($o['features'] as $i => $x) {
                $this->features[$i] = new Feature($x);
            }
        }
    }

    /**
     * Sets a known child element of FamilySearchPlatform from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether a child element was set.
     */
    protected function setKnownChildElement($xml) {
        $happened = parent::setKnownChildElement($xml);
        if ($happened) {
          return true;
        }
        else if (($xml->localName == 'childAndParentsRelationship') && ($xml->namespaceURI == 'http://familysearch.org/v1/')) {
            $child = new Platform\Tree\ChildAndParentsRelationship($xml);
            if (!isset($this->childAndParentsRelationships)) {
                $this->childAndParentsRelationships = array();
            }
            array_push($this->childAndParentsRelationships, $child);
            $happened = true;
        }
        else if (($xml->localName == 'discussion') && ($xml->namespaceURI == 'http://familysearch.org/v1/')) {
            $child = new Platform\Discussions\Discussion($xml);
            if (!isset($this->discussions)) {
                $this->discussions = array();
            }
            array_push($this->discussions, $child);
            $happened = true;
        }
        else if (($xml->localName == 'user') && ($xml->namespaceURI == 'http://familysearch.org/v1/')) {
            $child = new Platform\Users\User($xml);
            if (!isset($this->users)) {
                $this->users = array();
            }
            array_push($this->users, $child);
            $happened = true;
        }
        else if (($xml->localName == 'merge') && ($xml->namespaceURI == 'http://familysearch.org/v1/')) {
            $child = new Platform\Tree\Merge($xml);
            if (!isset($this->merges)) {
                $this->merges = array();
            }
            array_push($this->merges, $child);
            $happened = true;
        }
        else if (($xml->localName == 'mergeAnalysis') && ($xml->namespaceURI == 'http://familysearch.org/v1/')) {
            $child = new Platform\Tree\MergeAnalysis($xml);
            if (!isset($this->mergeAnalyses)) {
                $this->mergeAnalyses = array();
            }
            array_push($this->mergeAnalyses, $child);
            $happened = true;
        }
        else if (($xml->localName == 'feature') && ($xml->namespaceURI == 'http://familysearch.org/v1/')) {
            $child = new Feature($xml);
            if (!isset($this->features)) {
                $this->features = array();
            }
            array_push($this->features, $child);
            $happened = true;
        }
        return $happened;
    }

    /**
     * Sets a known attribute of FamilySearchPlatform from an XML reader.
     *
     * @param \XMLReader $xml The reader.
     * @return bool Whether an attribute was set.
     */
    protected function setKnownAttribute($xml) {
        if (parent::setKnownAttribute($xml)) {
            return true;
        }

        return false;
    }

    /**
     * Writes this FamilySearchPlatform to an XML writer.
     *
     * @param \XMLWriter $writer The XML writer.
     * @param bool $includeNamespaces Whether to write out the namespaces in the element.
     */
    public function toXml($writer, $includeNamespaces = true)
    {
        $writer->startElementNS('fs', 'familysearch', null);
        if ($includeNamespaces) {
            $writer->writeAttributeNs('xmlns', 'gx', null, 'http://gedcomx.org/v1/');
            $writer->writeAttributeNs('xmlns', 'fs', null, 'http://familysearch.org/v1/');
        }
        $this->writeXmlContents($writer);
        $writer->endElement();
    }

    /**
     * Writes the contents of this FamilySearchPlatform to an XML writer. The startElement is expected to be already provided.
     *
     * @param \XMLWriter $writer The XML writer.
     */
    public function writeXmlContents($writer)
    {
        parent::writeXmlContents($writer);
        if ($this->childAndParentsRelationships) {
            foreach ($this->childAndParentsRelationships as $i => $x) {
                $writer->startElementNs('fs', 'childAndParentsRelationship', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
        if ($this->discussions) {
            foreach ($this->discussions as $i => $x) {
                $writer->startElementNs('fs', 'discussion', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
        if ($this->users) {
            foreach ($this->users as $i => $x) {
                $writer->startElementNs('fs', 'user', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
        if ($this->merges) {
            foreach ($this->merges as $i => $x) {
                $writer->startElementNs('fs', 'merge', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
        if ($this->mergeAnalyses) {
            foreach ($this->mergeAnalyses as $i => $x) {
                $writer->startElementNs('fs', 'mergeAnalysis', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
        if ($this->features) {
            foreach ($this->features as $i => $x) {
                $writer->startElementNs('fs', 'feature', null);
                $x->writeXmlContents($writer);
                $writer->endElement();
            }
        }
    }
}
