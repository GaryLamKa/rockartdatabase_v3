<?php

namespace Wikibase\Repo;

use Language;
use Wikibase\DataModel\Services\EntityId\EntityIdLabelFormatter;
use Wikibase\Lib\SnakFormatter;
use Wikibase\View\EntityIdFormatterFactory;

/**
 * A factory for generating EntityIdHtmlLinkFormatters.
 *
 * @license GPL-2.0-or-later
 * @author Daniel Kinzler
 */
class EntityIdLabelFormatterFactory implements EntityIdFormatterFactory {

	/**
	 * @see EntityIdFormatterFactory::getOutputFormat
	 *
	 * @return string SnakFormatter::FORMAT_HTML
	 */
	public function getOutputFormat() {
		return SnakFormatter::FORMAT_PLAIN;
	}

	/**
	 * @see EntityIdFormatterFactory::getEntityIdFormatter
	 *
	 * @param Language $language
	 *
	 * @return EntityIdLabelFormatter
	 */
	public function getEntityIdFormatter( Language $language ) {
		$labelDescriptionLookup = WikibaseRepo::getDefaultInstance()
			->getLanguageFallbackLabelDescriptionLookupFactory()
			->newLabelDescriptionLookup( $language );

		return new EntityIdLabelFormatter( $labelDescriptionLookup );
	}

}
