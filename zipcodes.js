/**
 * zipcodes.js
 *
 * Example:
 *
 *   getZipCode('US', '90210', function (zip) {
 *       console.log(zip);
 *   });
 * 
 */
var getZipCode = function (country, zip, callback) {
    var key = {
            'AD': 0,
            'AR': 2,
            'AS': 0,
            'AT': 2,
            'AU': 2,
            'AX': 0,
            'BD': 1,
            'BE': 1,
            'BG': 1,
            'BM': 0,
            'BR': 1,
            'BY': 1,
            'CA': 1,
            'CH': 1,
            'CO': 1,
            'CR': 0,
            'CZ': 2,
            'DE': 2,
            'DK': 1,
            'DO': 0,
            'DZ': 2,
            'ES': 2,
            'FI': 1,
            'FO': 0,
            'FR': 2,
            'GB': 2,
            'GF': 0,
            'GG': 0,
            'GL': 0,
            'GP': 0,
            'GT': 0,
            'GU': 0,
            'HR': 1,
            'HU': 1,
            'IE': 0,
            'IM': 0,
            'IN': 3,
            'IS': 0,
            'IT': 2,
            'JE': 0,
            'JP': 3,
            'LI': 0,
            'LK': 1,
            'LT': 2,
            'LU': 1,
            'LV': 1,
            'MC': 0,
            'MD': 1,
            'MH': 0,
            'MK': 0,
            'MP': 0,
            'MQ': 0,
            'MT': 0,
            'MX': 3,
            'MY': 1,
            'NC': 0,
            'NL': 1,
            'NO': 1,
            'NZ': 1,
            'PH': 1,
            'PK': 2,
            'PL': 2,
            'PM': 0,
            'PR': 0,
            'PT': 3,
            'RE': 0,
            'RO': 2,
            'RU': 2,
            'SE': 2,
            'SI': 0,
            'SJ': 0,
            'SK': 1,
            'SM': 0,
            'TH': 0,
            'TR': 2,
            'UA': 2,
            'US': 2,
            'UY': 1,
            'VA': 0,
            'VI': 0,
            'WF': 0,
            'YT': 0,
            'ZA': 1
        },
        headers = [
            'countryCode',
            'postalCode',
            'placeName',
            'adminName1',
            'adminCode1',
            'adminName2',
            'adminCode2',
            'adminName3',
            'adminCode3',
            'latitude',
            'longitude',
            'accuracy'
        ];
    if (typeof key[country] !== 'undefined') {
        var k = key[country] > 0 ? zip.toUpperCase().replace(/[^0-9A-Z]/g, '').substr(0, key[country]) : 0;
        window.zipCodesCallback = function (zipCodes) {
            var result = {};
            if (typeof zipCodes[zip] !== 'undefined') {
                for (var i = 0, len = headers.length; i < len; i++) {
                    result[headers[i]] = zipCodes[zip][i];
                }
                callback(result);
            }
            else {
                callback(false);
            }
        };
        var script = document.createElement('script');
        script.src = 'https://' + country.toUpperCase() + '.zipcodes.gdn/min/' + k + '.jsonp';
        document.body.appendChild(script);
    }
};