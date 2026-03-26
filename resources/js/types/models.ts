export interface MediaImage {
    id: number;
    url: string;
    srcset?: string;
}

export interface Category {
    id: number;
    name: string;
    slug: string;
    description: string | null;
    seo_title: string | null;
    seo_description: string | null;
    banner_image: MediaImage | null;
}

export interface Author {
    id: number;
    name: string;
    slug: string;
    email: string;
    bio: string | null;
    avatar: MediaImage | null;
    twitter_handle: string | null;
    github_handle: string | null;
    linkedin_handle: string | null;
    instagram_handle: string | null;
    facebook_handle: string | null;
}

export interface Post {
    id: number;
    title: string;
    slug: string;
    excerpt: string | null;
    content: string | null;
    published_at: string | null;
    banner_image: MediaImage | null;
    gallery: MediaImage[];
    category: Category | null;
    author: Author | null;
}
