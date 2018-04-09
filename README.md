![](https://avatars2.githubusercontent.com/u/35705465?s=26&v=4)
zipcodes.js
===========

Free postal code validation for the web.

## Features

- Validates against expected regex patterns of the country.
- Looks up the code via a CDN for accurate validation and geographical data.


## Usage

`<script src="https://cdn.jsdelivr.net/gh/zipcodes/zipcodes.js@1.0/zipcodes.min.js"></script>`

```
getZipCode('US', '90210', function (result) {
    console.log(result);
});
```

Output:

```
{
    "input":{
        "country": "US",
        "zip": "90210"
    },
    "lookup":{
        "countryCode": "US",
        "postalCode": "90210",
        "placeName": "Beverly Hills",
        "adminName1": "California",
        "adminCode1": "CA",
        "adminName2": "Los Angeles",
        "adminCode2": "037",
        "adminName3": "",
        "adminCode3": "",
        "latitude": "34.0901",
        "longitude": "-118.4065",
        "accuracy": "4"
    },
    "pattern": /^\d{5}(-\d{4})?$/,
    "validPattern": true,
    "validLookup": true,
    "valid": true
}
```

## Supported Countries

Country codes should follow [ISO 3166-1 alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2)

| Flag                                                                         | Code | Country                                      | Regex | Lookup |
| -----------------------------------------------------------------------------|:----:|----------------------------------------------|:-----:|:------:|
| <img src="https://flags.zipcodes.gdn/png/256/AD.png" height="12" width="23"> | AD   | Andorra                                      | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/AE.png" height="12" width="23"> | AE   | United Arab Emirates                         | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/AF.png" height="12" width="23"> | AF   | Afghanistan                                  | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/AG.png" height="12" width="23"> | AG   | Antigua and Barbuda                          | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/AI.png" height="12" width="23"> | AI   | Anguilla                                     | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/AL.png" height="12" width="23"> | AL   | Albania                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/AM.png" height="12" width="23"> | AM   | Armenia                                      | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/AO.png" height="12" width="23"> | AO   | Angola                                       | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/AQ.png" height="12" width="23"> | AQ   | Antarctica                                   | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/AR.png" height="12" width="23"> | AR   | Argentina                                    | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/AS.png" height="12" width="23"> | AS   | American Samoa                               | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/AT.png" height="12" width="23"> | AT   | Austria                                      | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/AU.png" height="12" width="23"> | AU   | Australia                                    | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/AW.png" height="12" width="23"> | AW   | Aruba                                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/AX.png" height="12" width="23"> | AX   | sort                                         | ✖     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/AZ.png" height="12" width="23"> | AZ   | Azerbaijan                                   | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/BA.png" height="12" width="23"> | BA   | Bosnia and Herzegovina                       | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/BB.png" height="12" width="23"> | BB   | Barbados                                     | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/BD.png" height="12" width="23"> | BD   | Bangladesh                                   | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/BE.png" height="12" width="23"> | BE   | Belgium                                      | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/BF.png" height="12" width="23"> | BF   | Burkina Faso                                 | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/BG.png" height="12" width="23"> | BG   | Bulgaria                                     | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/BH.png" height="12" width="23"> | BH   | Bahrain                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/BI.png" height="12" width="23"> | BI   | Burundi                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/BJ.png" height="12" width="23"> | BJ   | Benin                                        | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/BL.png" height="12" width="23"> | BL   | Saint Barthélemy                             | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/BM.png" height="12" width="23"> | BM   | Bermuda                                      | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/BN.png" height="12" width="23"> | BN   | Brunei                                       | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/BO.png" height="12" width="23"> | BO   | Bolivia                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/BQ.png" height="12" width="23"> | BQ   | Caribbean Netherlands                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/BR.png" height="12" width="23"> | BR   | Brazil                                       | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/BS.png" height="12" width="23"> | BS   | The Bahamas                                  | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/BT.png" height="12" width="23"> | BT   | Bhutan                                       | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/BV.png" height="12" width="23"> | BV   | Bouvet Island                                | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/BW.png" height="12" width="23"> | BW   | Botswana                                     | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/BY.png" height="12" width="23"> | BY   | Belarus                                      | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/BZ.png" height="12" width="23"> | BZ   | Belize                                       | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/CA.png" height="12" width="23"> | CA   | Canada                                       | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/CC.png" height="12" width="23"> | CC   | Cocos (Keeling) Islands                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/CD.png" height="12" width="23"> | CD   | Democratic Republic of the Congo             | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/CF.png" height="12" width="23"> | CF   | Central African Republic                     | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/CG.png" height="12" width="23"> | CG   | Republic of the Congo                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/CH.png" height="12" width="23"> | CH   | Switzerland                                  | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/CI.png" height="12" width="23"> | CI   | Cote d'Ivoire                                | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/CK.png" height="12" width="23"> | CK   | Cook Islands                                 | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/CL.png" height="12" width="23"> | CL   | Chile                                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/CM.png" height="12" width="23"> | CM   | Cameroon                                     | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/CN.png" height="12" width="23"> | CN   | China                                        | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/CO.png" height="12" width="23"> | CO   | Colombia                                     | ✖     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/CR.png" height="12" width="23"> | CR   | Costa Rica                                   | ✖     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/CU.png" height="12" width="23"> | CU   | Cuba                                         | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/CV.png" height="12" width="23"> | CV   | Cabo Verde                                   | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/CW.png" height="12" width="23"> | CW   | Curaçao                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/CX.png" height="12" width="23"> | CX   | Christmas Island                             | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/CY.png" height="12" width="23"> | CY   | Cyprus                                       | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/CZ.png" height="12" width="23"> | CZ   | Czechia                                      | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/DE.png" height="12" width="23"> | DE   | Germany                                      | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/DJ.png" height="12" width="23"> | DJ   | Djibouti                                     | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/DK.png" height="12" width="23"> | DK   | Denmark                                      | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/DM.png" height="12" width="23"> | DM   | Dominica                                     | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/DO.png" height="12" width="23"> | DO   | Dominican Republic                           | ✖     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/DZ.png" height="12" width="23"> | DZ   | Algeria                                      | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/EC.png" height="12" width="23"> | EC   | Ecuador                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/EE.png" height="12" width="23"> | EE   | Estonia                                      | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/EG.png" height="12" width="23"> | EG   | Egypt                                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/EH.png" height="12" width="23"> | EH   | Western Sahara                               | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/ER.png" height="12" width="23"> | ER   | Eritrea                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/ES.png" height="12" width="23"> | ES   | Spain                                        | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/ET.png" height="12" width="23"> | ET   | Ethiopia                                     | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/FI.png" height="12" width="23"> | FI   | Finland                                      | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/FJ.png" height="12" width="23"> | FJ   | Fiji                                         | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/FK.png" height="12" width="23"> | FK   | Falkland Islands                             | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/FM.png" height="12" width="23"> | FM   | Federated States of Micronesia               | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/FO.png" height="12" width="23"> | FO   | Faroe Islands                                | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/FR.png" height="12" width="23"> | FR   | France                                       | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/GA.png" height="12" width="23"> | GA   | Gabon                                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/GB.png" height="12" width="23"> | GB   | United Kingdom                               | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/GD.png" height="12" width="23"> | GD   | Grenada                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/GE.png" height="12" width="23"> | GE   | Georgia                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/GF.png" height="12" width="23"> | GF   | French Guiana                                | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/GG.png" height="12" width="23"> | GG   | Guernsey                                     | ✖     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/GH.png" height="12" width="23"> | GH   | Ghana                                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/GI.png" height="12" width="23"> | GI   | Gibraltar                                    | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/GL.png" height="12" width="23"> | GL   | Greenland                                    | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/GM.png" height="12" width="23"> | GM   | The Gambia                                   | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/GN.png" height="12" width="23"> | GN   | Guinea                                       | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/GP.png" height="12" width="23"> | GP   | Guadeloupe                                   | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/GQ.png" height="12" width="23"> | GQ   | Equatorial Guinea                            | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/GR.png" height="12" width="23"> | GR   | Greece                                       | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/GS.png" height="12" width="23"> | GS   | South Georgia and the South Sandwich Islands | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/GT.png" height="12" width="23"> | GT   | Guatemala                                    | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/GU.png" height="12" width="23"> | GU   | Guam                                         | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/GW.png" height="12" width="23"> | GW   | Guinea-Bissau                                | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/GY.png" height="12" width="23"> | GY   | Guyana                                       | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/HK.png" height="12" width="23"> | HK   | Hong Kong                                    | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/HM.png" height="12" width="23"> | HM   | Heard Island and McDonald Islands            | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/HN.png" height="12" width="23"> | HN   | Honduras                                     | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/HR.png" height="12" width="23"> | HR   | Croatia                                      | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/HT.png" height="12" width="23"> | HT   | Haiti                                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/HU.png" height="12" width="23"> | HU   | Hungary                                      | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/ID.png" height="12" width="23"> | ID   | Indonesia                                    | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/IE.png" height="12" width="23"> | IE   | Republic of Ireland                          | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/IL.png" height="12" width="23"> | IL   | Israel                                       | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/IM.png" height="12" width="23"> | IM   | Isle of Man                                  | ✖     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/IN.png" height="12" width="23"> | IN   | India                                        | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/IO.png" height="12" width="23"> | IO   | British Indian Ocean Territory               | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/IQ.png" height="12" width="23"> | IQ   | Iraq                                         | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/IR.png" height="12" width="23"> | IR   | Iran                                         | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/IS.png" height="12" width="23"> | IS   | Iceland (IC)                                 | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/IT.png" height="12" width="23"> | IT   | Italy                                        | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/JE.png" height="12" width="23"> | JE   | Jersey                                       | ✖     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/JM.png" height="12" width="23"> | JM   | Jamaica                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/JO.png" height="12" width="23"> | JO   | Jordan                                       | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/JP.png" height="12" width="23"> | JP   | Japan                                        | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/KE.png" height="12" width="23"> | KE   | Kenya                                        | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/KG.png" height="12" width="23"> | KG   | Kyrgyzstan                                   | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/KH.png" height="12" width="23"> | KH   | Cambodia                                     | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/KI.png" height="12" width="23"> | KI   | Kiribati                                     | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/KM.png" height="12" width="23"> | KM   | Comoros                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/KN.png" height="12" width="23"> | KN   | Saint Kitts and Nevis                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/KP.png" height="12" width="23"> | KP   | North Korea                                  | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/KR.png" height="12" width="23"> | KR   | South Korea                                  | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/KW.png" height="12" width="23"> | KW   | Kuwait                                       | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/KY.png" height="12" width="23"> | KY   | Cayman Islands                               | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/KZ.png" height="12" width="23"> | KZ   | Kazakhstan                                   | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/LA.png" height="12" width="23"> | LA   | Laos                                         | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/LB.png" height="12" width="23"> | LB   | Lebanon                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/LC.png" height="12" width="23"> | LC   | Saint Lucia                                  | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/LI.png" height="12" width="23"> | LI   | Liechtenstein                                | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/LK.png" height="12" width="23"> | LK   | Sri Lanka                                    | ✖     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/LR.png" height="12" width="23"> | LR   | Liberia                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/LS.png" height="12" width="23"> | LS   | Lesotho                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/LT.png" height="12" width="23"> | LT   | Lithuania                                    | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/LU.png" height="12" width="23"> | LU   | Luxembourg                                   | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/LV.png" height="12" width="23"> | LV   | Latvia                                       | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/LY.png" height="12" width="23"> | LY   | Libya                                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/MA.png" height="12" width="23"> | MA   | Morocco                                      | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/MC.png" height="12" width="23"> | MC   | Monaco                                       | ✖     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/MD.png" height="12" width="23"> | MD   | Moldova                                      | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/ME.png" height="12" width="23"> | ME   | Montenegro                                   | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/MF.png" height="12" width="23"> | MF   | Collectivity of Saint Martin                 | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/MG.png" height="12" width="23"> | MG   | Madagascar                                   | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/MH.png" height="12" width="23"> | MH   | Marshall Islands                             | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/MK.png" height="12" width="23"> | MK   | Republic of Macedonia                        | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/ML.png" height="12" width="23"> | ML   | Mali                                         | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/MM.png" height="12" width="23"> | MM   | Myanmar                                      | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/MN.png" height="12" width="23"> | MN   | Mongolia                                     | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/MO.png" height="12" width="23"> | MO   | Macau                                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/MP.png" height="12" width="23"> | MP   | Northern Mariana Islands                     | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/MQ.png" height="12" width="23"> | MQ   | Martinique                                   | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/MR.png" height="12" width="23"> | MR   | Mauritania                                   | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/MS.png" height="12" width="23"> | MS   | Montserrat                                   | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/MT.png" height="12" width="23"> | MT   | Malta                                        | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/MU.png" height="12" width="23"> | MU   | Mauritius                                    | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/MV.png" height="12" width="23"> | MV   | Maldives                                     | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/MW.png" height="12" width="23"> | MW   | Malawi                                       | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/MX.png" height="12" width="23"> | MX   | Mexico                                       | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/MY.png" height="12" width="23"> | MY   | Malaysia                                     | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/MZ.png" height="12" width="23"> | MZ   | Mozambique                                   | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/NA.png" height="12" width="23"> | NA   | Namibia                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/NC.png" height="12" width="23"> | NC   | New Caledonia                                | ✖     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/NE.png" height="12" width="23"> | NE   | Niger                                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/NF.png" height="12" width="23"> | NF   | Norfolk Island                               | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/NG.png" height="12" width="23"> | NG   | Nigeria                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/NI.png" height="12" width="23"> | NI   | Nicaragua                                    | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/NL.png" height="12" width="23"> | NL   | Netherlands                                  | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/NO.png" height="12" width="23"> | NO   | Norway                                       | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/NP.png" height="12" width="23"> | NP   | Nepal                                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/NR.png" height="12" width="23"> | NR   | Nauru                                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/NU.png" height="12" width="23"> | NU   | Niue                                         | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/NZ.png" height="12" width="23"> | NZ   | New Zealand                                  | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/OM.png" height="12" width="23"> | OM   | Oman                                         | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/PA.png" height="12" width="23"> | PA   | Panama                                       | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/PE.png" height="12" width="23"> | PE   | Peru                                         | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/PF.png" height="12" width="23"> | PF   | French Polynesia                             | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/PG.png" height="12" width="23"> | PG   | Papua New Guinea                             | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/PH.png" height="12" width="23"> | PH   | Philippines                                  | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/PK.png" height="12" width="23"> | PK   | Pakistan                                     | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/PL.png" height="12" width="23"> | PL   | Poland                                       | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/PM.png" height="12" width="23"> | PM   | Saint Pierre and Miquelon                    | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/PN.png" height="12" width="23"> | PN   | Pitcairn Islands                             | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/PR.png" height="12" width="23"> | PR   | Puerto Rico                                  | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/PS.png" height="12" width="23"> | PS   | State of Palestine                           | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/PT.png" height="12" width="23"> | PT   | Portugal                                     | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/PW.png" height="12" width="23"> | PW   | Palau                                        | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/PY.png" height="12" width="23"> | PY   | Paraguay                                     | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/QA.png" height="12" width="23"> | QA   | Qatar                                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/RE.png" height="12" width="23"> | RE   | Réunion                                      | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/RO.png" height="12" width="23"> | RO   | Romania                                      | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/RS.png" height="12" width="23"> | RS   | Serbia.                                      | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/RU.png" height="12" width="23"> | RU   | Russia                                       | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/RW.png" height="12" width="23"> | RW   | Rwanda                                       | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/SA.png" height="12" width="23"> | SA   | Saudi Arabia                                 | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/SB.png" height="12" width="23"> | SB   | Solomon Islands                              | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/SC.png" height="12" width="23"> | SC   | Seychelles                                   | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/SD.png" height="12" width="23"> | SD   | Sudan                                        | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/SE.png" height="12" width="23"> | SE   | Sweden                                       | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/SG.png" height="12" width="23"> | SG   | Singapore                                    | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/SH.png" height="12" width="23"> | SH   | Saint Helena, Ascension and Tristan da Cunha | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/SI.png" height="12" width="23"> | SI   | Slovenia                                     | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/SJ.png" height="12" width="23"> | SJ   | Svalbard and Jan Mayen                       | ✖     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/SK.png" height="12" width="23"> | SK   | Slovakia                                     | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/SL.png" height="12" width="23"> | SL   | Sierra Leone                                 | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/SM.png" height="12" width="23"> | SM   | San Marino                                   | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/SN.png" height="12" width="23"> | SN   | Senegal                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/SO.png" height="12" width="23"> | SO   | Somalia                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/SR.png" height="12" width="23"> | SR   | Suriname                                     | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/SS.png" height="12" width="23"> | SS   | South Sudan                                  | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/ST.png" height="12" width="23"> | ST   | São Tomé and Príncipe                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/SV.png" height="12" width="23"> | SV   | El Salvador                                  | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/SX.png" height="12" width="23"> | SX   | Sint Maarten                                 | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/SY.png" height="12" width="23"> | SY   | Syria                                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/SZ.png" height="12" width="23"> | SZ   | Swaziland                                    | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/TC.png" height="12" width="23"> | TC   | Turks and Caicos Islands                     | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/TD.png" height="12" width="23"> | TD   | Chad                                         | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/TF.png" height="12" width="23"> | TF   | French Southern and Antarctic Lands          | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/TG.png" height="12" width="23"> | TG   | Togo                                         | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/TH.png" height="12" width="23"> | TH   | Thailand                                     | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/TJ.png" height="12" width="23"> | TJ   | Tajikistan                                   | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/TK.png" height="12" width="23"> | TK   | Tokelau                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/TL.png" height="12" width="23"> | TL   | East Timor                                   | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/TM.png" height="12" width="23"> | TM   | Turkmenistan                                 | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/TN.png" height="12" width="23"> | TN   | Tunisia                                      | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/TO.png" height="12" width="23"> | TO   | Tonga                                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/TR.png" height="12" width="23"> | TR   | Turkey                                       | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/TT.png" height="12" width="23"> | TT   | Trinidad and Tobago                          | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/TV.png" height="12" width="23"> | TV   | Tuvalu                                       | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/TW.png" height="12" width="23"> | TW   | Taiwan                                       | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/TZ.png" height="12" width="23"> | TZ   | Tanzania                                     | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/UA.png" height="12" width="23"> | UA   | Ukraine                                      | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/UG.png" height="12" width="23"> | UG   | Uganda                                       | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/UM.png" height="12" width="23"> | UM   | United States Minor Outlying Islands         | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/US.png" height="12" width="23"> | US   | United States                                | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/UY.png" height="12" width="23"> | UY   | Uruguay                                      | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/UZ.png" height="12" width="23"> | UZ   | Uzbekistan                                   | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/VA.png" height="12" width="23"> | VA   | Vatican City                                 | ✖     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/VC.png" height="12" width="23"> | VC   | Saint Vincent and the Grenadines             | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/VE.png" height="12" width="23"> | VE   | Venezuela                                    | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/VG.png" height="12" width="23"> | VG   | British Virgin Islands                       | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/VI.png" height="12" width="23"> | VI   | United States Virgin Islands                 | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/VN.png" height="12" width="23"> | VN   | Vietnam                                      | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/VU.png" height="12" width="23"> | VU   | Vanuatu                                      | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/WF.png" height="12" width="23"> | WF   | Wallis and Futuna                            | ✖     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/WS.png" height="12" width="23"> | WS   | Samoa                                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/YE.png" height="12" width="23"> | YE   | Yemen                                        | ✖     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/YT.png" height="12" width="23"> | YT   | Mayotte                                      | ✖     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/ZA.png" height="12" width="23"> | ZA   | South Africa                                 | ✓     | ✓      |
| <img src="https://flags.zipcodes.gdn/png/256/ZM.png" height="12" width="23"> | ZM   | Zambia                                       | ✓     | ✖      |
| <img src="https://flags.zipcodes.gdn/png/256/ZW.png" height="12" width="23"> | ZW   | Zimbabwe                                     | ✖     | ✖      |

# Sources

- Some patterns borrowed from https://github.com/sarcadass/i18n-zipcodes
- Zipcode database from http://download.geonames.org
