<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerTest\Zed\MerchantProductOfferDataImport\Helper;

use Codeception\Module;
use Orm\Zed\ProductOffer\Persistence\SpyProductOfferQuery;

class MerchantProductOfferDataImportHelper extends Module
{
    public function assertProductOfferDatabaseTableIsEmpty(): void
    {
        $query = $this->getProductOfferPropelQuery();

        $this->assertSame(0, $query->count(), 'Found at least one entry in the database table but database table was expected to be empty.');
    }

    public function assertProductOfferDatabaseTableContainsData(): void
    {
        $query = $this->getProductOfferPropelQuery();

        $this->assertTrue($query->count() > 0, 'Expected at least one entry in the database table but database table is empty.');
    }

    protected function getProductOfferPropelQuery(): SpyProductOfferQuery
    {
        return SpyProductOfferQuery::create();
    }
}
