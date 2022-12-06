<template>
	<div id="enquiry-details">
		<main role="main" class="main-content">
			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="col-12">
						<h2 class="page-title mb-2">Enquiry</h2>
						<div class="card shadow mb-4">
							<div class="card-header">
								<div class="d-flex justify-content-between">
									<strong class="card-title">Enquiry Content</strong>
									<strong class="card-title">Status:
										<span :class="statusColor(enquiryQuestion.status)">
											<span class="status">
												{{ statusName(enquiryQuestion.status) }}
											</span>
										</span>
									</strong>
								</div>

							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group mb-3">
											<label>Name</label>
											<el-input :placeholder="enquiryQuestion.name" disabled></el-input>
										</div>
									</div> <!-- /.col -->
									<div class="col-md-6">
										<div class="form-group mb-3">
											<label>Email</label>
											<el-input :placeholder="enquiryQuestion.email" disabled></el-input>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<label>Message</label>
											<el-input type="textarea" :rows="2" :placeholder="enquiryQuestion.message"
												disabled>
											</el-input>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3 ml-5">
											<label>Update Status: </label><br />
											<input class="form-check-input" type="checkbox" value="0"
												v-model="form.status" id="newCheck">
											<label class="form-check-label mr-5" for="newCheck"> New </label>
											<input class="form-check-input" type="checkbox" value="1"
												v-model="form.status" id="newCheck">
											<label class="form-check-label mr-5" for="newCheck"> Complete </label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group mb-3">
											<el-button type="success" size="mini" :loading="loading"
												@click.prevent="updateEnquiry()">
												{{ loading ? 'Updating enquiry.....' : 'Update Enquiry' }}
											</el-button>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- / .card -->
					</div> <!-- .col-12 -->
				</div> <!-- .row -->
			</div> <!-- .container-fluid -->
		</main> <!-- main -->
	</div>
</template>

<script>
import Api from '../../../../apis/admin/Api'
export default {
	name: 'EnquiryDetails',
	data() {
		return {
			loading: false,
			enquiryQuestion: {},
			form: {
				status: []
			}
		}
	},
	methods: {
		statusName: function (status) {
			let data = { 0: "New", 1: "Complete" }
			return data[status]
		},
		statusColor: function (status) {
			let data = { 0: "badge badge-pill badge-dark text-white", 1: "badge badge-pill badge-success text-white" }
			return data[status]
		},
		getEnquiryDetail: async function () {
			Api().get('/admin/get-enquiry-detail/' + this.$route.params.id)
				.then((response) => {
					this.enquiryQuestion = response.data.enquiryQuestion
				})
		},
		updateEnquiry: async function(){
			this.loading = true
			Api().post('/admin/update-enquiry/'+this.$route.params.id, this.form)
			this.loading = false
		}
	},
	mounted() {
		this.getEnquiryDetail()
	}
}
</script>