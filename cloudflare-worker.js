addEventListener('fetch', event => {
  event.respondWith(handleRequest(event.request))
})

async function handleRequest(request) {
  const links = (await DATA.get('bing-ids')).split('\n')
  const url = new URL(request.url)
  let type = url.searchParams.get('type')
  const returnType = url.searchParams.get('return')
  const randomIndex = Math.floor(Math.random() * links.length)
  const randomName = links[randomIndex]
  let imageUrl = 'https://cn.bing.com/th?id=' + randomName

  if (type === 'auto') {
    const userAgent = request.headers.get('User-Agent')
    if (userAgent.includes('Mobile')) {
      type = 'm'
    } else {
      type = 'pc'
    }
  }

  if (type === 'm' || type === 'mobile') {
    imageUrl += '_1080x1920.jpg'
  } else if (type === 'uhd') {
    imageUrl += '_UHD.jpg'
  } else {
    imageUrl += '_1920x1080.jpg'
  }

  if (returnType === 'server') {
    const response = await fetch(imageUrl)
    const headers = new Headers(response.headers)
    headers.append('Access-Control-Allow-Origin', '*')
    return new Response(response.body, { ...response, headers })
  } else {
    return Response.redirect(imageUrl, 302)
  }
}