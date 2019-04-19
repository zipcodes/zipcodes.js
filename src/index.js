/**
 * zipcodes.js
 *
 * Example:
 *
 *   getZipCode('US', '90210', function (result) {
 *       console.log(result);
 *   });
 *
 */
const getZipCode = (c, zip, callback) => {
    let keys = {
            AD: 0,
            AR: 2,
            AS: 0,
            AT: 2,
            AU: 2,
            AX: 0,
            BD: 1,
            BE: 1,
            BG: 1,
            BM: 0,
            BR: 1,
            BY: 1,
            CA: 1,
            CH: 1,
            CO: 1,
            CR: 0,
            CZ: 2,
            DE: 2,
            DK: 1,
            DO: 0,
            DZ: 2,
            ES: 2,
            FI: 1,
            FO: 0,
            FR: 2,
            GB: 2,
            GF: 0,
            GG: 0,
            GL: 0,
            GP: 0,
            GT: 0,
            GU: 0,
            HR: 1,
            HU: 1,
            IE: 0,
            IM: 0,
            IN: 3,
            IS: 0,
            IT: 2,
            JE: 0,
            JP: 3,
            LI: 0,
            LK: 1,
            LT: 2,
            LU: 1,
            LV: 1,
            MC: 0,
            MD: 1,
            MH: 0,
            MK: 0,
            MP: 0,
            MQ: 0,
            MT: 0,
            MX: 3,
            MY: 1,
            NC: 0,
            NL: 1,
            NO: 1,
            NZ: 1,
            PH: 1,
            PK: 2,
            PL: 2,
            PM: 0,
            PR: 0,
            PT: 3,
            RE: 0,
            RO: 2,
            RU: 2,
            SE: 2,
            SI: 0,
            SJ: 0,
            SK: 1,
            SM: 0,
            TH: 0,
            TR: 2,
            UA: 2,
            US: 2,
            UY: 1,
            VA: 0,
            VI: 0,
            WF: 0,
            YT: 0,
            ZA: 1
        },
        patterns = {
            AD: /^(([a-zA-Z]{2}\d{3})|(\d{4}))$/,
            AM_AZ_BJ_BY_CN_IN_KG_KZ_MN_RO_RS_RU_SG_TJ_TM_UZ: /^[0-9]{6}$/,
            AR: /^((\d{4})|([a-zA-Z]{1}\d{4}[a-zA-Z]{3}))$/,
            AS_BA_CS_CU_DE_DZ_EE_ES_FI_FM_GF_GP_GT_GU_HR_IC_ID_IL_IT_KE_KW_LT_MA_ME_MH_MM_MP_MQ_MX_MY_PK_PM_PR_PS_PW_RE_SA_SM_TH_TR_UA_UY_VI_VN_YU_ZM: /^[0-9]{5}$/,
            AT_AU_BD_BE_BG_CH_CX_CY_DK_GL_GW_HU_LI_LU_MD_MK_MZ_NO_NZ_PH_SD_SI_TN_VE_XK_ZA: /^[0-9]{4}$/,
            BM: /^[a-zA-Z]{2}\s\d{2}$/,
            BN: /^[a-zA-Z]{2}\d{4}$/,
            BR: /^(\d{5})(-\d{3})?$/,
            CA: /^[ABCEGHJKLMNPRSTVXY]{1}\d{1}[A-Z]{1} *\d{1}[A-Z]{1}\d{1}$/,
            CZ_GR_SE_SK: /^[0-9]{3}\s?[0-9]{2}$/,
            FO: /^([a-zA-Z]{2}-)?(\d{3})?$/,
            FR: /^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/,
            GB: /^GIR?0AA|[A-PR-UWYZ]([0-9]{1,2}|([A-HK-Y][0-9]|[A-HK-Y][0-9]([0-9]|[ABEHMNPRV-Y]))|[0-9][A-HJKS-UW])?[0-9][ABD-HJLNP-UW-Z]{2}$/,
            GE: /^((\d{4})|(\d{6}))$/,
            IE: /^(([a-zA-Z]{2}(\s(([a-zA-Z0-9]{1})|(\d{2})))?)|([a-zA-Z]{3}))$/,
            IS_MG: /^[0-9]{3}$/,
            JP: /^\d{3}(-\d{4})?$/,
            KR: /^\d{3}-\d{3}$/,
            LV: /^([a-zA-Z]{2}-)?(\d{4})$/,
            MT: /^[a-zA-Z]{3}\s\d{2,4}$/,
            MV: /^\d{4,5}$/,
            NL: /^(\d{4})\s?[a-zA-Z]{2}$/,
            PL: /^\d{2}(-)?\d{3}$/,
            PT: /^\d{4}(-)?\d{3}$/,
            SZ: /^[a-zA-Z]{1}\d{3}$/,
            TW: /^\d{3}(\d{2})?$/,
            US: /^\d{5}(-\d{4})?$/,
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
        ],
        pattern = null,
        country = c && c.toLocaleUpperCase();

    // Check patterns.
    if (typeof patterns[country] !== 'undefined') {
        pattern = patterns[country];
    }
    else {
        for (let k in patterns) {
            if (patterns.hasOwnProperty(k) && k.indexOf(country) > 0) {
                pattern = patterns[k];
                break;
            }
        }
    }
    let result = {
        input: {
            country: country,
            zip: zip
        },
        lookup: {},
        pattern: pattern,
        validPattern: pattern && pattern.test(zip),
        validLookup: false,
        valid: false
    };

    // Process lookup if pattern is unmatched or validated.
    if (!result.pattern || result.validPattern) {
        if (typeof keys[country] !== 'undefined') {
            // Remove specificity that is beyond our database.
            if (country === 'US' && zip.indexOf('-') === 5) {
                zip = zip.substring(0, zip.indexOf('-'));
            }
            window.zipCodesCallback = function (zipCodes) {
                if (typeof zipCodes[zip] !== 'undefined') {
                    for (let i = 0, len = headers.length; i < len; i++) {
                        result.lookup[headers[i]] = zipCodes[zip][i];
                    }
                    result.validLookup = true;
                    result.valid = true;
                }
                callback(result);
            };
            let k = keys[country] > 0 ? zip.toUpperCase().replace(/[^0-9A-Z]/g, '').substr(0, keys[country]) : 0,
                script = document.createElement('script');
            script.src = 'https://' + country + '.zipcodes.gdn/min/' + k + '.jsonp';
            document.body.appendChild(script);
        }
        else {
            // Unable to lookup and/or pattern match.
            result.valid = true;
            callback(result);
        }
    }
};

module.exports = getZipCode