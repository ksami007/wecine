module.exports = {
    devServer: {
        open: process.platform === 'darwin',
        host: '1247.0.0.1',
        port: 8888, // CHANGE YOUR PORT HERE!
        https: true,
        hotOnly: false,
    },
}