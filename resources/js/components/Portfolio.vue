<template>
    <div class="h-screen flex flex-col justify-center items-center">
        <div class="prose text-center text-grey select-none px-2">
            <div class="md:prose-lg lg:prose-xl">
                <img class="rounded-full max-h-44 max-w-44 mb-8 md:max-w-56 md:max-h-56 lg:max-w-72 lg:max-h-72 flex items-center justify-center m-auto" src="/images/chris-profile.jpg" />
                <h1 style="margin:0px">{{ displayName }}</h1>
                <p class="my-1"><strong>Senior Software Engineer</strong></p>
            </div>
            <!-- <div class="w-full items-center relative overflow-hidden">
                <ul class="flex justify-center align-middle text-sm space-x-3 scroll-fade">
                    <skill v-for="skill in skills" :key="skill.id" :skill="skill"></skill>
                </ul>
            </div> -->
            <div class="prose-sm md:prose-md lg:prose-lg mt-5 px-6 md:px-0 py-1">
                <p>{{ personalStatement }}</p>
            </div>
            
        </div>
    </div>
    <div id="portfolios" class="relative" v-bind="$attrs">
        <project v-for="project in projects" v-bind:key="project.id" v-bind:project="project"></project>
    </div>
</template>

<script>
import Project from './Project.vue';
import Skill from './Skill.vue'; 

export default {
    data: function () {
        return {
            "displayName": "",
            "personalStatement": "",
            "projects": [],
            "skills": {}
        }
    },
    mounted: function () {
        var self = this

        fetch('api/portfolio/1')
        .then(response => {
            return response.json()
        })
        .then(data => {
            var portfolio = data.data

            self.displayName = portfolio.displayName
            self.personalStatement = portfolio.personalStatement
            self.projects = portfolio.projects
            
            self.projects.forEach(project => {
                project.skills.forEach(skill => {
                    var s = self.skills[skill.id]
                    if (s === undefined) {
                        skill['count'] = 0
                        self.skills[skill.id] = skill
                    } else {
                        self.skills[skill.id].count ++
                    }
                }); 
            });
        })
    },
    components: {
        Project,
        Skill
    }
};
</script>