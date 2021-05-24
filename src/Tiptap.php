<?php

namespace Manogi\Tiptap;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\Expandable;

class Tiptap extends Field
{
    use Expandable;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'tiptap';

    /**
     * Indicates if the element should be shown on the index view.
     *
     * @var bool
     */
    public $showOnIndex = false;

    /**
     * Set the buttons that should be available in the menu.
     *
     * @param  array  $buttons
     * @return $this
     */
    public function buttons(array $buttons)
    {
        return $this->withMeta([
            'buttons' => $buttons
        ]);
    }

    /**
     * Set the heading levels that should be available when using headings
     *
     * @param  mixed  $headingLevels
     * @return $this
     */
    public function headingLevels($headingLevels)
    {
        $headingLevelsArr = $headingLevels;
        if (is_int($headingLevels)) {
            $headingLevelsArr = [];
            for ($n = 1; $n <= $headingLevels; $n++) {
                $headingLevelsArr[] = $n;
            }
        }

        return $this->withMeta([
            'headingLevels' => $headingLevelsArr
        ]);
    }

    /**
     * Turn on syntax highlighting when using code_block
     *
     * @param  mixed  $syntaxHighlighting
     * @return $this
     */
    public function syntaxHighlighting()
    {
        return $this->withMeta([
            'syntaxHighlighting' => true
        ]);
    }

    /**
     * Set the heading levels that should be available when using headings
     *
     * @param  mixed  $htmlTheme
     * @return $this
     */
    public function htmlTheme($htmlTheme)
    {
        return $this->withMeta([
            'htmlTheme' => $htmlTheme
        ]);
    }

    /**
     * Set the alignments that should be available when using textAlign
     *
     * @param  mixed  $alignments
     * @return $this
     */
    public function alignments($alignments)
    {
        return $this->withMeta([
            'alignments' => $alignments
        ]);
    }

    /**
     * Set the DOM elements that can be aligned when using textAlign
     *
     * @param  mixed  $alignElements
     * @return $this
     */
    public function alignElements($alignElements)
    {
        return $this->withMeta([
            'alignElements' => $alignElements
        ]);
    }

    /**
     * Set the default alignment when using textAlign
     *
     * @param  mixed  $defaultAlignment
     * @return $this
     */
    public function defaultAlignment($defaultAlignment)
    {
        return $this->withMeta([
            'defaultAlignment' => $defaultAlignment
        ]);
    }

    /**
     * Set the placeholder
     *
     * @param  mixed  $placeholder
     * @return $this
     */
    public function placeholder($placeholder)
    {
        return $this->withMeta([
            'placeholder' => $placeholder
        ]);
    }

    public function jsonSerialize()
    {
        return array_merge(parent::jsonSerialize(), [
            'shouldShow' => $this->shouldBeExpanded(),
        ]);
    }
}
