import { utils } from '../utils/utils'

import '../../scss/pages/videos.scss'


const playList = [{
	source: 'https://bookerbee.com/B-Medical-Systems_Corporate-video_web.mp4',
	type: 'video/mp4',
}, {
	source: 'https://bookerbee.com/Legacy_Video-Updated_02.mp4',
	type: 'video/mp4',
}, {
	source: 'https://bookerbee.com/BMed_from_factory_to_last_miles.mp4',
	type: 'video/mp4',
}]

const video = document.getElementById('video')
const source = document.getElementById('source')
const fadeDuration = 2000 // milliseconds

let index = -1

const videoEndedHandler = async e => {
	const autoplay = typeof e !== 'undefined'

	if (autoplay) {
		video.classList.remove('fade-in')
		await utils.sleep(fadeDuration)
	}

	index++
	if (index > playList.length - 1) index = 0

	source.setAttribute('src', playList[index].source)
	source.setAttribute('type', playList[index].type)
	video.load();
	video.classList.add('fade-in')
	
	if (autoplay) video.play();
}

video.addEventListener('ended', videoEndedHandler, false)

videoEndedHandler()

