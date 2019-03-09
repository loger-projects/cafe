<template>
    <form action="">
        <div class="columns">
            <div class="column">
                <b-field>
                    <b-autocomplete
                        v-model="time"
                        :data="filteredTimeArray"
                        @select="option => selectedTime = option"
                        rounded
                        placeholder="08:00 am"
                        icon="clock"
                        icon-pack="far">
                        <template slot="empty">No Result Found</template>
                    </b-autocomplete>
                </b-field>
            </div>
            <div class="column">
                <b-field>
                    <b-datepicker
                        v-model="date"
                        placeholder="Select a Date"
                        icon="calendar-alt"
                        icon-pack="far"
                        editable
                        :min-date="minDate"
                        :max-date="maxDate">
                    </b-datepicker>
                </b-field>
            </div>
            <div class="column">
                <b-field>
                    <b-autocomplete
                        v-model="people"
                        :data="filteredPeopleArray"
                        @select="option => selectedPeople = option"
                        placeholder="2 people"
                        rounded
                        icon="users"
                        icon-pack="fas">
                        <template slot="empty">No Result Found</template>
                    </b-autocomplete>
                </b-field>
            </div>
            <div class="column">
                <div class="field is-expanded">
                    <div class="control">
                        <button type="submit" class="button is-fullwidth btn-primary">BOOK A TABLE</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    name: 'SiteBaseBookTableForm',
    data() {
        const today = new Date()
        return {
            time: '',
            selectedTime: null,
            timeList: [
                '09:00 am',
                '10:00 am',
                '11:00 am',
                '12:00 am',
                '01:00 pm', 
                '02:00 pm',
                '03:00 pm',
                '04:00 pm',
                '05:00 pm',
                '06:00 pm',
                '07:00 pm',
                '08:00 pm'
            ],
            date: new Date(),
            minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
            maxDate: new Date(today.getFullYear(), today.getMonth(), today.getDate() + 7),
            people: '',
            selectedPeople: null,
            peopleList: [
                '01 person',
                '02 people',
                '03 people',
                '04 people',
                '05 people',
                '06 people',
                '07 people',
                '08 people',
                '09 people',
                '10 people',
                '11 people',
                '12 people',
                '13 people',
                '14 people',
                '15 people'
            ]
        }
    },
    computed: {
        filteredTimeArray() {
            return this.timeList.filter( option =>
                option.toString().indexOf(this.time.toLowerCase()) >= 0
            )
        },
        filteredPeopleArray() {
            return this.peopleList.filter( option =>
                option.toString().indexOf(this.people.toLowerCase()) >= 0
            )
        }
    }
}
</script>
