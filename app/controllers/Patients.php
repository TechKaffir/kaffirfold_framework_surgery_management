<?php
defined('ROOTPATH') or exit('Access Denied!');
/**
 * Patients Controller Class
 */

class Patients
{
	use Controller;
	use Model;

	public function index($action = null, $id = null)
	{
		/*** INSTANTIATE RELEVANT INSTANCES (OBJECTS) ***/
		$patient = new Patient();
		$data['action'] = $action;

		// Notifications
		$notification = new Notification;
		$data['notifications'] = $notification->notifications();
		$data['unreadNotifications'] = $notification->getUnreadNotifications(user('id'));

		if (isset($_POST['input'])) {

			$input = $_POST['input'];
			
			$sql = "SELECT * FROM patients WHERE First_Name LIKE '{$input}%' OR Surname LIKE '{$input}%'";
			$results = $this->query($sql);
			
			?>
			<!-- Table with stripped rows -->
			<table class="table">

				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">File No.</th>
						<th scope="col">Name</th>
						<th scope="col">Medical Aid</th>
						<th scope="col">Employer</th>
						<th scope="col">Phone</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$userRows = 1;
					if (!empty($results)) :
						foreach ($results as $row) :
					?>
							<tr>
								<th scope="row"><?= $userRows++ ?></th>

								<td><?= $row->File_Number ? $row->File_Number : '0000' ?></td>
								<td><?= $row->Surname . ', ' . $row->First_Name ?></td>
								<td><?= $row->medical_aid_scheme ? $row->medical_aid_scheme : 'N/A'  ?></td>
								<td><?= $row->Employer ? $row->Employer : 'N/A'  ?></td>
								<td><?= $row->contact_number  ? $row->contact_number  : 'Not Provided'  ?></td>
								<td>
									<div class="text-center d-flex">
										<a href="<?= ROOT ?>/admin/patients/view/<?= $row->id ?>"><i class="bi bi-eye m-2 text-success"></i></a>
										<a href="<?= ROOT ?>/admin/patients/edit/<?= $row->id ?>"><i class="bi bi-pencil-square m-2"></i></a>
										<a href="<?= ROOT ?>/admin/patients/delete/<?= $row->id ?>" onclick="alert('Are you sure you want to delete this record? This action cannot be reversed. Click \'OK\' to proceed OR \'JUST REFRESH THE PAGE\' to cancel the action!')"><i class="bi bi-trash m-2 text-danger "></i></a>
									</div>
								</td>
								<?= Util::displayFlash('no_patient_record_found', 'danger') ?>
							</tr>
					<?php
						endforeach;
					endif;
					?>
				</tbody>
			</table>
			<!-- End Table with stripped rows -->
<?php

		}
	}
}
