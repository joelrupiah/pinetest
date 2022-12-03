<template>
<div id="booking-list">

</div>
</template>

<script>
import Api from '../../../../apis/admin/Api'
export default {
name: 'BookingList',
data() {
return {
bookings: [],
}
},
methods: {
getAllBookings: async function(){
await Api().get('all-bookings')
.then((response) => {
this.bookings = response.data.bookings
})
}
}
}
</script
