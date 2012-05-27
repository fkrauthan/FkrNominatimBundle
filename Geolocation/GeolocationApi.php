<?php
	namespace Fkr\NominatimBundle\Geolocation;
	
	use Fkr\NominatimBundle\Entity\Location;
	use Buzz\Browser;
	use Buzz\Client\MultiCurl as CurlClient;


	class GeolocationApi {
		
		/**
		 * User agent
		 *
		 * @var string
		 */
		protected $userAgent;
		
		
		public function __construct($appName, $appMail) {
			$this->userAgent = 'FkrNominatimBundle '.$appName.' - '.$appMail;
		}
		
		/**
		 * Set the user agent
		 *
		 * @param string $userAgent User agent
		 */
		public function setUserAgent($userAgent) {
			$this->userAgent = $userAgent;
		}
		
		
		public function locateAddress($address) {
			if(is_array($address)) {
				$addressArray = $address;
				$address = '';
				foreach($addressArray as $addr) {
					$address .= ', '.$addr;
				}
				$address = substr($address, 2);
			}
			
			return $this->request(str_replace(' ', '%20', $address));
		}
		
		protected function request($address) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'http://nominatim.openstreetmap.org/search?q='.$address.'&format=json&addressdetails=1');
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
			$response = curl_exec($ch);
			curl_close($ch);
			
			$jsonOutput = json_decode($response, true);
			if(!$jsonOutput) {
				//TODO exception
			}
			else if(count($jsonOutput)<=0) {
				return null;
			}
			else if(count($jsonOutput)>1) {
				$results = array();
				foreach($jsonOutput as $result) {
					$results[] = $this->convertToLocationObject($result);
				}
				return $results;
			}
			else {
				return $this->convertToLocationObject($jsonOutput[0]);
			}
		}
		
		protected function convertToLocationObject($result) {
			$ret = new Location();
			
			$ret->setRoad($this->getElement($result['address'], 'road'));
			$ret->setHouseNumber($this->getElement($result['address'],'house_number'));
			$ret->setSubUrb($this->getElement($result['address'], 'suburb'));
			$ret->setCity($this->getElement($result['address'], 'city'));
			$ret->setPostCode($this->getElement($result['address'], 'postcode'));
			
			$ret->setStateDistrict($this->getElement($result['address'], 'state_district'));
			$ret->setState($this->getElement($result['address'], 'state'));
			
			$ret->setCountry($this->getElement($result['address'], 'country'));
			$ret->setCountryCode($this->getElement($result['address'], 'country_code'));
			
			$ret->setLatitude($result['lat']);
			$ret->setLongitude($result['lon']);
			
			return $ret;
		}
		
		protected function getElement(array $array, $key, $default='') {
			if(isset($array[$key])) {
				return $array[$key];
			}
			
			return $default;
		}
		
	}
