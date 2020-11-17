<template>
    <div>
        <h4>Date: July xxxx</h4>
        <hr>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Day</th>
                <th scope="col">Event Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Mark</td>
                </tr>   
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    name: "app",
    data() {
        return {
            message: 'Component Message!'
        }
    }
}
</script>
<style scoped>

</style>