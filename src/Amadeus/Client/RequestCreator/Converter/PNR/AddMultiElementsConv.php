<?php
/**
 * amadeus-ws-client
 *
 * Copyright 2015 Amadeus Benelux NV
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @package Amadeus
 * @license https://opensource.org/licenses/Apache-2.0 Apache 2.0
 */

namespace Amadeus\Client\RequestCreator\Converter\PNR;

use Amadeus\Client\RequestCreator\Converter\BaseConverter;
use Amadeus\Client\RequestOptions\PnrAddMultiElementsBase;
use Amadeus\Client\RequestOptions\PnrCreatePnrOptions;
use Amadeus\Client\Struct;

/**
 * PNR_AddMultiElements Request converter
 *
 * @package Amadeus\Client\RequestCreator\Converter\PNR
 * @author Dieter Devlieghere <dieter.devlieghere@benelux.amadeus.com>
 */
class AddMultiElementsConv extends BaseConverter
{
    /**
     * @param PnrAddMultiElementsBase $requestOptions
     * @return Struct\Pnr\RetrieveAndDisplay
     */
    public function convert($requestOptions, $version)
    {
        if ($requestOptions instanceof PnrCreatePnrOptions && empty($requestOptions->receivedFrom)) {
            //Automagically add RF if not present:
            $requestOptions->receivedFrom = $this->params->receivedFrom;
        }

        $req = new Struct\Pnr\AddMultiElements($requestOptions);

        return $req;
    }
}