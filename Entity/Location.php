<?php
	namespace Fkr\NominatimBundle\Entity;
	
	
	class Location {
		
		protected $road;
		protected $houseNumber;
		protected $subUrb;
		protected $city;
		protected $postCode;
		
		protected $stateDistrict;
		protected $state;
		
		protected $country;
		protected $countryCode;
		
		protected $latitude;
		protected $longitude;
		
		
		public function setRoad($road) {
			$this->road = $road;
		}
		
		public function getRoad() {
			return $this->road;
		}
		
		public function setHouseNumber($houseNumber) {
			$this->houseNumber = $houseNumber;
		}
		
		public function getHouseNumber() {
			return $this->houseNumber;
		}
		
		public function setSubUrb($subUrb) {
			$this->subUrb = $subUrb;
		}
		
		public function getSubUrb() {
			return $this->subUrb;
		}
		
		public function setCity($city) {
			$this->city = $city;
		}
		
		public function getCity() {
			return $this->city;
		}
		
		public function setPostCode($postCode) {
			$this->postCode = $postCode;
		}
		
		public function getPostCode() {
			return $this->postCode;
		}
		
		public function setStateDistrict($stateDistrict) {
			$this->stateDistrict = $stateDistrict;
		}
		
		public function getStateDistrict() {
			return $this->stateDistrict;
		}
		
		public function setState($state) {
			$this->state = $state;
		}
		
		public function getState() {
			return $this->state;
		}
		
		public function setCountry($country) {
			$this->country = $country;
		}
		
		public function getCountry() {
			return $this->country;
		}
		
		public function setCountryCode($countryCode) {
			$this->countryCode = $countryCode;
		}
		
		public function getCountryCode() {
			return $this->countryCode;
		}
		
		public function setLatitude($latitude) {
			$this->latitude = $latitude;
		}
		
		public function getLatitude() {
			return $this->latitude;
		}
		
		public function setLongitude($longitude) {
			$this->longitude = $longitude;
		}
		
		public function getLongitude() {
			return $this->longitude;
		}
		
	}
