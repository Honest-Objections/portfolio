<template>
    <div class="min-w-screen min-h-screen bg-green-500 flex flex-col justify-center items-center">
        <div class="prose text-center text-grey select-none px-2">
            <img class="rounded-full max-h-36 max-w-36 flex items-center justify-center m-auto" src="images/chris-profile.jpg" />
            <h1 style="margin:0px">Chris Clifton</h1>
            <p class="my-0" style="margin:0px"><strong>Software Engineer</strong></p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint cumque veritatis error quos nihil nesciunt assumenda itaque debitis, ducimus, labore esse voluptas omnis, veniam sunt temporibus expedita consequatur. Rerum, voluptates?</p>
        </div>
    </div>
    <div id="portfolios" class="relative" v-bind="$attrs">
        <timeline></timeline>
        <project v-for="project in projects" v-bind:key="project.id" v-bind:project="project"></project>
    </div>
</template>

<script>
import Project from './Project.vue';

export default {
  components: { Project },
    data: function () {
        return {
            "projects": [
                {
                    "id": 1,
                    "name": "Adidas Tango Allstars",
                    "description": "Tango Allstars was a competition run by Adidas with mini tournaments across the globe. To help facilitate it, Event Engineering provided a tournament mangement set of software.\n\nMy role in the project was the *Display Manager*, built on **Electron**. Reciving live updates from the server and displaying them in realtime, with goal animations, flappers and tournament overview screens, it provided a flexible way for local sites to quickly setup and manage their tournament.",
                    "skills": ['electron', 'jQuery', 'sass', 'websockets'], 
                    "photos": ['adidas.png']
                },
                {
                    "id": 2,
                    "name": "Gatorade",
                    "description": "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint cumque veritatis error quos nihil nesciunt assumenda itaque debitis, ducimus, labore esse voluptas omnis, veniam sunt temporibus expedita consequatur. Rerum, voluptates?",
                    "skills": ['electron', 'jQuery', 'sass', 'websockets'], 
                    "photos": ['gatorade.jpg']
                }
            ]
        }
    },
    setup: function() {
        console.log("Getting portfolio data")
    },
    components: {
        Project
    }
};
</script>