<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Public extends Controller_Site {

	public function before()
	{
		parent::before();
	}

	public function lead_form($full = false)
	{
		$complete = false;
		$user = new \Darth\Model\Lead;
		$lead_form = $user->get_lead_form()
			->add('submit', 'submit', array('text' => __('Send Inquiry!')));

		$lead_form->campaign_id->set('value', $this->_campaign);

		if($lead_form->load()->validate())
		{
			$complete = true;

			if($lead_form->campaign_id->val())
			{
				$this->_campaign = $lead_form->campaign_id->val();
			}
			$campaign = \Kacela::find_one('campaign', \Kacela::criteria()->equals('id', $this->_campaign));
			$this->_lead_download = $campaign->download_link;
		}

		return \View::factory('lead_form', array('language' => true))
			->bind('form', $lead_form)
			->set('lead_download', $this->_lead_download)
			->set('complete', $complete)
			->set('full', $full);
	}

	public function side_lead_form()
	{
		$complete = false;
		$user = new \Darth\Model\Lead;
		$lead_form = $user->get_lead_form('sidelead')
			->add('submit', 'submit', array('text' => __('Send Inquiry!')));

		$lead_form->campaign_id->set('value', $this->_campaign);

		if($lead_form->load()->validate())
		{
			$complete = true;
		}

		return \View::factory('sidebar_lead_form', array('language' => true))
			->bind('form', $lead_form)
			->set('complete', $complete);
	}

	public function side_support()
	{
		$this->_set_chat();

		return \View::factory('sidebar/support', array('language' => true))
			->set('chat', $this->_chat);
	}
}