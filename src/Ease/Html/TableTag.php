<?php

namespace Ease\Html;

/** 
 *  @author Vítězslav Dvořák <info@vitexsoftware.cz>, Jana Viktorie Borbina <jana@borbina.com>
 *
 * HTML table.
 */
class TableTag extends PairTag
{
	/**
	 * Table header.
	 * @var Thead
	 */
	public $tHead = null;

	/**
	 * Table Body
	 * @var Tbody
	 */
	public $tBody = null;

	/**
	 * Table Foot
	 * @var Tfoot 
	 */
	public $tFoot = null;

	/**
	 * Html Table.
	 *
	 * @param mixed $content    inserted value
	 * @param array $properties table tag properties
	 */
	public function __construct($content = null, $properties = [])
	{
		parent::__construct('table', $properties);
		$this->tHead = $this->addItem(new Thead());
		$this->tBody = $this->addItem(new Tbody($content));
		$this->tFoot = $this->addItem(new Tfoot());
	}

	/**
	 * @param array $headerColumns table header items
	 */
	public function setHeader(array $headerColumns)
	{
		$this->tHead->emptyContents();
		$this->addRowHeaderColumns($headerColumns);
	}

	/**
	 * Inserts the contents of the field into the table as cells.
	 *
	 * @param array $columns    array of cell contents
	 * @param array $properties property field given to all cells
	 *
	 * @return TrTag table row reference
	 */
	public function &addRowColumns($columns = null, $properties = [])
	{
		$tableRow = $this->tBody->addItem(new TrTag());
		if (is_array($columns)) {
			foreach ($columns as $column) {
				if (
					is_object($column) && method_exists($column, 'getTagType') && $column->getTagType()
					== 'td'
				) {
					$tableRow->addItem($column);
				} else {
					$tableRow->addItem(new TdTag($column, $properties));
				}
			}
		}

		return $tableRow;
	}

	/**
	 * Inserts the contents of the field into the table as cells.
	 *
	 * @param array $columns    array of cell contents
	 * @param array $properties property field given to all cells
	 *
	 * @return TrTag table row reference
	 */
	public function &addRowHeaderColumns($columns = null, $properties = [])
	{
		$tableRow = $this->tHead->addItem(new TrTag());
		if (is_array($columns)) {
			foreach ($columns as $column) {
				if (
					is_object($column) && method_exists($column, 'getTagType') && $column->getTagType()
					== 'th'
				) {
					$tableRow->addItem($column);
				} else {
					$tableRow->addItem(new ThTag($column, $properties));
				}
			}
		}

		return $tableRow;
	}

	/**
	 * Insert columns into table foot
	 *
	 * @param array $columns    values
	 * @param array $properties options to add
	 *
	 * @return TrTag table row reference
	 */
	public function &addRowFooterColumns($columns = null, $properties = [])
	{
		$tableRow = $this->tFoot->addItem(new TrTag());
		if (is_array($columns)) {
			foreach ($columns as $column) {
				if (
					is_object($column) && method_exists($column, 'getTagType') && $column->getTagType()
					== 'th'
				) {
					$tableRow->addItem($column);
				} else {
					$tableRow->addItem(new ThTag($column, $properties));
				}
			}
		}

		return $tableRow;
	}

	/**
	 * Is Table Empty?
	 *
	 * @param Container|null $element   is only here for backward compatibility
	 *
	 * @return boolean
	 */
	public function isEmpty($element = null)
	{
		return $this->tBody->isEmpty($element);
	}

	/**
	 * Empties container contents.
	 */
	public function emptyContents()
	{
		$this->tBody->emptyContents();
	}

	/**
	 * Contentets.
	 * 
	 * @return mixed
	 */
	public function getContents()
	{
		return $this->tBody->getContents();
	}

	/**
	 * Returns number of enclosed items in current or given object.
	 *
	 * @return int nuber of parts enclosed
	 */
	public function getItemsCount()
	{
		return $this->tBody->getItemsCount();
	}

	/**
	 * Fill table with given data.
	 *
	 * @param array $contents
	 */
	public function populate($contents)
	{
		foreach ($contents as $cRow) {
			$this->addRowColumns($cRow);
		}
	}

	/**
	 * Remove empty tHead and tFoot.
	 */
	public function finalize()
	{
		if ($this->tHead->isEmpty()) {
			$this->tHead->suicide();
		}
		if ($this->tFoot->isEmpty()) {
			$this->tFoot->suicide();
		}
		$this->finalized = true;
	}
}
